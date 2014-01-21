package se.group1.royalhearts;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

/**
 * Created by Lukas on 2014-01-20.
 */
public class Login extends Activity implements View.OnClickListener {
    Button login;
    TextView textUsername;
    TextView textPassword;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login_layout);
        getWindow().setSoftInputMode(
                WindowManager.LayoutParams.SOFT_INPUT_STATE_HIDDEN);
        login = (Button)findViewById(R.id.login);
        textPassword = (TextView)findViewById(R.id.password);
        textUsername = (TextView)findViewById(R.id.username);
        login.getBackground().setAlpha(150);
        login.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        if (v == login){
            Intent i = new Intent(getBaseContext(), MainActivity.class);
            startActivity(i);
            this.finish();
        } else  {
            Toast.makeText(getApplicationContext(), "Du har skrivit fel inloggningsuppgifter",
                    Toast.LENGTH_LONG).show();
            textUsername.setText("*** Användarnamn");
            textUsername.setTextColor(getResources().getColor(R.color.colorRed));
            textPassword.setText("*** Lösenord");
            textPassword.setTextColor(getResources().getColor(R.color.colorRed));
        }

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
