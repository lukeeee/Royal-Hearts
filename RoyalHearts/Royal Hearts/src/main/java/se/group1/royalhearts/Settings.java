package se.group1.royalhearts;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

/**
 * Created by Lukas on 2014-01-20.
 */
public class Settings extends Activity implements View.OnClickListener {
    private Button mydata;
    private Button aboutUs;
    private Button logout;
    private Button version;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.settings_layout);
        mydata = (Button)findViewById(R.id.myData);
        aboutUs = (Button)findViewById(R.id.about);
        logout = (Button)findViewById(R.id.logout);
        version = (Button)findViewById(R.id.version);
        mydata.getBackground().setAlpha(0);
        aboutUs.getBackground().setAlpha(0);
        logout.getBackground().setAlpha(0);
        version.getBackground().setAlpha(0);
        mydata.setOnClickListener(this);
        aboutUs.setOnClickListener(this);
        logout.setOnClickListener(this);
        version.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        if (v == mydata){
            mydata.setTextColor(getResources().getColor(R.color.colorWhite));
            AlertDialog.Builder dialog = new AlertDialog.Builder(Settings.this);
            dialog.setTitle("Dina Uppgifter");
            dialog.setIcon(R.drawable.ic_action_about_d);
            dialog.setMessage("Användarnamn:\nE-Mail:\n");
            dialog.setNegativeButton("Stäng", new DialogInterface.OnClickListener() {
                public void onClick(DialogInterface dialog, int which) {
                    dialog.cancel();
                    mydata.setTextColor(getResources().getColor(R.color.colorBlack));

                }
            });
            dialog.show();

        }
        else if (v == aboutUs){
            aboutUs.setTextColor(getResources().getColor(R.color.colorWhite));
            AlertDialog.Builder dialog = new AlertDialog.Builder(Settings.this);
            dialog.setTitle("Om Royal Hearts");
            dialog.setIcon(R.drawable.ic_action_about_d);
            dialog.setMessage("Detta är appen till Matkassen.se där du kan se din inköpslista med varorna" +
                    " du har lagt till från websidan\n\nGjord av:\n\nLukas Andersson\nLucas Viksten\nSam Jonsson\n" +
                    "Silvia Nilsson\nGiacomo Palma\nAlexis Capot");
            dialog.setNegativeButton("Stäng", new DialogInterface.OnClickListener() {
                public void onClick(DialogInterface dialog, int which) {
                    dialog.cancel();
                    aboutUs.setTextColor(getResources().getColor(R.color.colorBlack));
                }
            });
            dialog.show();

        }
        else if (v == logout){
            logout.setTextColor(getResources().getColor(R.color.colorWhite));
            Intent i = new Intent(getApplicationContext(), Login.class);
            startActivity(i);
            this.finish();
        }
        else if (v == version){
            version.setTextColor(getResources().getColor(R.color.colorWhite));
            AlertDialog.Builder dialog = new AlertDialog.Builder(Settings.this);
            dialog.setTitle("Version");
            dialog.setIcon(R.drawable.ic_action_about_d);
            dialog.setMessage("Beta 1.0.0");
            dialog.setNegativeButton("Stäng", new DialogInterface.OnClickListener() {
                public void onClick(DialogInterface dialog, int which) {
                    dialog.cancel();
                    version.setTextColor(getResources().getColor(R.color.colorBlack));
                }
            });
            dialog.show();

        }
        }
}
