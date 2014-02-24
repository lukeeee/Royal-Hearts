package se.group1.royalhearts.Json;

        import android.os.AsyncTask;

        import org.json.JSONException;

        import java.io.BufferedReader;
        import java.io.IOException;
        import java.io.InputStream;
        import java.io.InputStreamReader;
        import java.io.Reader;
        import java.net.URL;
        import java.nio.charset.Charset;

        import se.group1.royalhearts.JsonManager;

//import com.group2.bottomapp.APIManager;

/**
 * Created by Hugo on 2013-12-11.
 */
public class AddToBag extends AsyncTask<String, Void, String> {

    @Override
    protected String doInBackground(String... strings) {
        try {
            return getJsonFromUrl(strings[0]);
        }
        catch (Exception e) {}

        return null;
    }

    @Override
    protected void onPostExecute(String result) {
        try {
            JsonManager.addToBag();
        } catch (Exception e) {}
    }

    public static String getJsonFromUrl(String url) throws IOException, JSONException {
        InputStream is = new URL(url).openStream();
        try {
            BufferedReader rd = new BufferedReader(new InputStreamReader(is, Charset.forName("UTF-8")));
            String jsonText = readAll(rd);
            //Log.i("Post", jsonText);
            return jsonText;
        } finally {
            is.close();
        }
    }
    private static String readAll(Reader rd) throws IOException {
        StringBuilder sb = new StringBuilder();
        int cp;
        while ((cp = rd.read()) != -1) {
            sb.append((char) cp);
        }
        return sb.toString();
    }
}