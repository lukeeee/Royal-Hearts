package se.group1.royalhearts;

import android.app.Activity;
import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.util.Log;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.conn.ConnectTimeoutException;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.params.BasicHttpParams;
import org.apache.http.params.HttpConnectionParams;
import org.apache.http.params.HttpParams;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.SocketTimeoutException;


public class JSONLogin {
    private Context context;
    private User user;
    private String username;
    private String password;
    private Login callback;

    public JSONLogin(Context context, Login callback, String username, String password){
        this.context = context;
        this.username = username;
        this.password = password;
        this.callback = callback;
    }

    public void PostJson(){
        callback.showProgressDialog();
        new HttpAsyncTask().execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/user/login/" + username + "/" + password);
    }


    public static String POSTLOGIN(String url){
        InputStream inputStream = null;
        String result = "";
        try {

            // timeout parameters
            HttpParams httpParams = new BasicHttpParams();
            int timeoutConnection = 3000;
            int timeoutSocket = 5000;
            HttpConnectionParams.setConnectionTimeout(httpParams, timeoutConnection);
            HttpConnectionParams.setSoTimeout(httpParams, timeoutSocket);

            HttpClient httpclient = new DefaultHttpClient(httpParams);
            HttpGet httpGet = new HttpGet(url);

            int statusCode;

            HttpResponse httpResponse = httpclient.execute(httpGet);
            inputStream = httpResponse.getEntity().getContent();
            statusCode = httpResponse.getStatusLine().getStatusCode();
            if(inputStream != null){
                result = convertInputStreamToString(inputStream);
            } else {
                result = "Did not work!";
            }

            // if there is a server error
            if(statusCode == 500){
                result = "Server Error";
            }


            // wrong combination of userId and identifier
            if(statusCode == 403){
                result = "Wrong account details";
            }

            // to much data sent in
            if(statusCode == 400){
                result = "Something went wrong";
            }

            // to much data sent in
            if(statusCode == 404){
                result = "Something went wrong";
            }

        } catch (ConnectTimeoutException ex) {
            result = "Server Timeout";
            Log.e("Exception Timeout: ", ex.getMessage());
        } catch (SocketTimeoutException ex) {
            result = "Server Timeout";
            Log.e("Exception Timeout: ", ex.getMessage());
        } catch (Exception e) {
            Log.d("InputStream", e.getLocalizedMessage());
            result = "Did not work!";
        }


        return result;
    }

    public boolean isConnected(){
        ConnectivityManager connMgr = (ConnectivityManager) context.getSystemService(Activity.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        if (networkInfo != null && networkInfo.isConnected())
            return true;
        else
            return false;
    }


    private class HttpAsyncTask extends AsyncTask<String, Void, String> {
        @Override
        protected String doInBackground(String... urls) {



            return POSTLOGIN(urls[0]);
        }
        // onPostExecute displays the results of the AsyncTask.
        @Override
        protected void onPostExecute(String result) {

             if(result.contains("Login failed!")){
                callback.hideProgressDialog();
                callback.showErrorDialog("Login failed, wrong email or password!");
            } else if(result.contains("Internal Error")){
                callback.hideProgressDialog();
                callback.showErrorDialog("A server error has occurred!");
            } else if(result.contains("Did not work!")){
                callback.hideProgressDialog();
            } else {
                 int userId = 0;
                // String userIdentifier = null;
                 //String userCountryCode = null;

                 try {
                     JSONObject jsonObject = new JSONObject(result);

                     userId = Integer.parseInt(jsonObject.getString("id"));
                     //userIdentifier = jsonObject.getString("identifier");
                     //userCountryCode = jsonObject.getString("country");

                 } catch (JSONException e) {
                     Log.e("Exception JSON: ", e.getMessage());
                 }


                 if(userId == -1){
                     //wrong username or password
                     callback.hideProgressDialog();
                     //callback.showFeedbackToast("Wrong username or password!, Please try again.");
                 } else if (userId != -1){
                     // user logged in

                     callback.hideProgressDialog();
                     callback.sucess();
                 }

            }
        }
    }

    /* if(result.contains("Did not work!")){
                callback.hideProgressDialog();
                callback.showErrorDialog("A error has occurred! Please try again.");
            } else if (result.contains("Server Error")){
                callback.hideProgressDialog();
                callback.showErrorDialog("A server error has occurred! Please try again.");
            } else if (result.contains("Server Timeout")){
                callback.hideProgressDialog();
                callback.showErrorDialog("The server is not responding! Please try again.");
            } else {
                int userId = 0;
                String userIdentifier = null;
                String userCountryCode = null;

                try {
                    JSONObject jsonObject = new JSONObject(result);

                    userId = Integer.parseInt(jsonObject.getString("userid"));
                    userIdentifier = jsonObject.getString("identifier");
                    userCountryCode = jsonObject.getString("country");

                } catch (JSONException e) {
                    Log.e("Exception JSON: ", e.getMessage());
                }


                if(userId == -1){
                    // wrong username or password
                    callback.hideProgressDialog();
                    callback.showFeedbackToast("Wrong username or password!, Please try again.");
                } else if (userId != -1 && userId != 0 && userIdentifier != null
                        && userCountryCode != null){
                    // user logged in

                    User.UserDetails.setIdentifier(userIdentifier);
                    User.UserDetails.setUserId(userId);
                    User.UserDetails.setUserCountryCode(userCountryCode);
                    callback.googleRegister();
                }
            }*/



    private static String convertInputStreamToString(InputStream inputStream) throws IOException {
        BufferedReader bufferedReader = new BufferedReader( new InputStreamReader(inputStream));
        String line = "";
        String result = "";
        while((line = bufferedReader.readLine()) != null)
            result += line;

        inputStream.close();
        return result;

    }

}

