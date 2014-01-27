package se.group1.royalhearts;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends Activity {

    private ProgressDialog progressDialog;
    private TextView kasse;
    private Spinner storeSpinner;
    private Spinner citySpinner;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        kasse = (TextView)findViewById(R.id.kasse);
        kasse.setText("Användarnamns " + "Matkasse");
        storeSpinner = (Spinner)findViewById(R.id.StoreSpinner);
        citySpinner= (Spinner) findViewById(R.id.CitySpinner);

        final List<String> cList=new ArrayList<String>();
        cList.add("Välj Stad");
        cList.add("Borås");
        cList.add("Göteborg");
        cList.add("Stockholm");
        cList.add("Växjö");

        ArrayAdapter<String> CityAdr=new ArrayAdapter<String>(this,
                android.R.layout.simple_list_item_1,cList);
        CityAdr.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        citySpinner.setAdapter(CityAdr);


        final List<String> sList=new ArrayList<String>();
        sList.add("Välj Butik");
        sList.add("City Gross");
        sList.add("Coop Extra");
        sList.add("Ica Maxi");
        sList.add("Willys");

        ArrayAdapter<String> StoreAdr=new ArrayAdapter<String>(this,
                android.R.layout.simple_list_item_1,sList);
        StoreAdr.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        storeSpinner.setAdapter(StoreAdr);
    }
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {

        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    public void showProgressDialog(){
        if(progressDialog == null){
            // display dialog when loading data
            progressDialog = ProgressDialog.show(this, "Refreshing", "Please Wait ", true, false);
        } else {
            progressDialog.cancel();
            progressDialog = ProgressDialog.show(this, "Refreshing","Please Wait...", true, false);
        }
    }

    // hide loading dialog
    public void hideProgressDialog(){
        // if loading dialog is visible, then hide it
        if(progressDialog != null){
            progressDialog.cancel();
        }
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.action_settings:
                Intent settingsIntent = new Intent(getBaseContext(), Settings.class);
                startActivity(settingsIntent);
                return true;
            case R.id.action_refresh:
                Intent intent = getIntent();
                overridePendingTransition(0, 0);
                intent.addFlags(Intent.FLAG_ACTIVITY_NO_ANIMATION);
                finish();
                overridePendingTransition(0, 0);
                startActivity(intent);
                showProgressDialog();
                return true;
        }

        return true;

    }
    class SpinnerItem {
        private final String text;
        private final boolean isHint;

        public SpinnerItem(String strItem, boolean flag) {
            this.isHint = flag;
            this.text = strItem;
        }

        public String getItemString() {
            return text;
        }

        public boolean isHint() {
            return isHint;
        }
    }
    class MySpinnerAdapter extends ArrayAdapter<SpinnerItem> {
        public MySpinnerAdapter(Context context, int resource, List<SpinnerItem> objects) {
            super(context, resource, objects);
        }

        @Override
        public int getCount() {
            return super.getCount() - 1; // This makes the trick: do not show last item
        }

        @Override
        public SpinnerItem getItem(int position) {
            return super.getItem(position);
        }

        @Override
        public long getItemId(int position) {
            return super.getItemId(position);
        }

    }
}
