package se.group1.royalhearts;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.os.Handler;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.WindowManager;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

/**
 * Created by Lukas on 2014-01-20.
 */
public class Login extends Activity implements View.OnClickListener {
    private Button login;
    private EditText usernameInput;
    private EditText passwordInput;
    private TextView username;
    private TextView password;
    private ProgressDialog progressDialog;
    private JSONLogin jLoginPoster = null;
    String userName;
    Animation jiggle, blink;
    private static int BLINK = 60000;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login_layout);
        login = (Button)findViewById(R.id.login);
        login.requestFocus();
        usernameInput = (EditText)findViewById(R.id.usernameInput);
        passwordInput = (EditText)findViewById(R.id.passwordInput);
        username = (TextView)findViewById(R.id.username);
        password = (TextView)findViewById(R.id.password);
        login.setOnClickListener(this);
        getWindow().setSoftInputMode(
                WindowManager.LayoutParams.SOFT_INPUT_STATE_HIDDEN);
        jiggle = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.jiggle);
        blink = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.blink);


        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                username.startAnimation(blink);
                usernameInput.startAnimation(blink);
                password.startAnimation(blink);
                passwordInput.startAnimation(blink);
            }}, BLINK);


        try{
            Intent intent = getIntent();

            usernameInput.setText(intent.getStringExtra("userName"));
            passwordInput.setText(intent.getStringExtra("userPassword"));
        } catch (Exception ex) {
        }
    }
    // show loading dialog
    public void showProgressDialog(){
        if(progressDialog ==  null){
            // display dialog when loading data
            progressDialog = ProgressDialog.show(this, "Loggar in", "Var god vänta...", true, false);
        }
    }
    public void sucess() {
        Intent i = new Intent(getBaseContext(), MainActivity.class);
        startActivity(i);
        HelperClass.User.userName = userName;
        this.finish();

    }
    public void failed() {
        username.setText("*** Användarnamn");
        username.setTextColor(getResources().getColor(R.color.colorRed));
        password.setText("*** Lösenord");
        password.setTextColor(getResources().getColor(R.color.colorRed));

    }

    // hide loading dialog
    public void hideProgressDialog(){
        // if loading dialog is visible, then hide it
        if(progressDialog != null){
            progressDialog.cancel();
        }
    }

    // show the error dialog
    public void showErrorDialog(String message){
        // if an error occurred

        // set progress dialog to null
        progressDialog = null;

        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setCancelable(true);
        builder.setTitle("An Error has occurred!");
        builder.setMessage(message);
        builder.setInverseBackgroundForced(true);
        builder.setPositiveButton("Ok", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
            }
        });

        AlertDialog alert = builder.create();
        alert.show();
    }


    @Override
    public void onClick(View v) {
        userName = usernameInput.getText().toString();
        String userPass = passwordInput.getText().toString();
        if (v == login){
            login.startAnimation(jiggle);
            SoundHelper.vibrate(this);
                jLoginPoster = new JSONLogin(getApplicationContext(), this, userName, userPass);
                // if we are connected
                if(jLoginPoster.isConnected() != false)
                {
                    jLoginPoster.PostJson();

                }


            } else {
                Toast.makeText(this, "Ditt Användarnamn eller Lösenord är Fel", 1000);


            }


        }

    private boolean isConnected(){
        ConnectivityManager connMgr = (ConnectivityManager) getApplicationContext().getSystemService(Activity.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();

        if (networkInfo != null && networkInfo.isConnected()){
            return true;
        } else {
            return false;
        }

    }

    // show the error dialog
    private void showErrorDialog(){
        // if an error occurred

        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setCancelable(true);
        builder.setTitle("You need internet for the app to work!");
        builder.setMessage("Please turn on your internet connection!");
        builder.setInverseBackgroundForced(true);
        builder.setPositiveButton("Ok", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
            }
        });

        AlertDialog alert = builder.create();
        alert.show();
    }
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {

        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.info, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.action_about:
                AlertDialog.Builder dialog = new AlertDialog.Builder(Login.this);
                dialog.setTitle("Om Royal Hearts");
                dialog.setIcon(R.drawable.ic_action_about_d);
                dialog.setMessage("Logga in för att se din inköpslista som du har lagt upp på Matkassen.se");
                dialog.setNegativeButton("Stäng", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.cancel();
                    }
                });
                dialog.show();

        }

        return true;

    }
}

