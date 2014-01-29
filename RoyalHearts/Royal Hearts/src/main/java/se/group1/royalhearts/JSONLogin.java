package se.group1.royalhearts;

import android.app.Activity;
import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.util.Log;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;

/**
 * Created by Lukas on 2014-01-28.
 */
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
        new HttpAsyncTask().execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/login/");
    }


    public static String POSTLOGIN(String url, User user){
        InputStream inputStream = null;
        String result = "";
        try {

            HttpClient httpclient = new DefaultHttpClient();
            HttpPost httpPost = new HttpPost(url);

            String json = "";

            JSONObject jsonObject = new JSONObject();
            jsonObject.accumulate("username", user.getUsername());
            jsonObject.accumulate("password", user.getPassword());

            json = jsonObject.toString();

            StringEntity se = new StringEntity(json);

            httpPost.setEntity(se);
            httpPost.setHeader("Accept", "application/json");
            httpPost.setHeader("Authorization", "apikey='1c9fk3u35ldcefgw'");
            httpPost.setHeader("Content-type", "application/json");

            HttpResponse httpResponse = httpclient.execute(httpPost);

            inputStream = httpResponse.getEntity().getContent();

            //int statusCode = httpResponse.getStatusLine().getStatusCode();

            if(inputStream != null)
                result = convertInputStreamToString(inputStream);
            else
                result = "Did not work!";

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

            user = new User();
            user.setUsername(username);
            user.setPassword(password);

            return POSTLOGIN(urls[0], user);
        }
        // onPostExecute displays the results of the AsyncTask.
        @Override
        protected void onPostExecute(String result) {

            if(result.contains("Loggats in")){
                // set values to helper class
                HelperClass.User.setValues(result);
                //callback.saveValues();
                callback.hideProgressDialog();
                //callback.finishActivity(HelperClass.User.userName + " Har loggats in");
            } else if(result.contains("Login failed!")){
                callback.hideProgressDialog();
                callback.showErrorDialog("Login failed, wrong email or password!");
            } else if(result.contains("Internal Error")){
                callback.hideProgressDialog();
                callback.showErrorDialog("A server error has occurred!");
            } else if(result.contains("Did not work!")){
                callback.hideProgressDialog();
            }
        }
    }

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

