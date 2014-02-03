package se.group1.royalhearts;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.LinearLayout;
import android.widget.Spinner;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends Activity {

    private ProgressDialog progressDialog;
    private TextView kasse,cat1text,cat2text,cat3text,cat4text;
    private Spinner storeSpinner;
    private Spinner citySpinner;
    private ArrayList<Categories> categories;
    LinearLayout cat1,cat2,cat3,cat4;
    boolean fruktAdapterCreated = false;
    boolean charkAdapterCreated = false;
    boolean mejeriAdapterCreated = false;
    boolean godisAdapterCreated = false;
    //TextView halo;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        kasse = (TextView)findViewById(R.id.kasse);
        kasse.setText(HelperClass.User.userName + "'s Inköpslista");
        storeSpinner = (Spinner)findViewById(R.id.StoreSpinner);
        citySpinner= (Spinner) findViewById(R.id.CitySpinner);
        cat1text = (TextView)findViewById(R.id.cat1Text);
        cat2text = (TextView)findViewById(R.id.cat2Text);
        cat3text = (TextView)findViewById(R.id.cat3text);
        cat4text = (TextView)findViewById(R.id.cat4text);
        cat1 = (LinearLayout)findViewById(R.id.cat1);
        cat2 = (LinearLayout)findViewById(R.id.cat2);
        cat3 = (LinearLayout)findViewById(R.id.cat3);
        cat4 = (LinearLayout)findViewById(R.id.cat4);


        final List<String> cList=new ArrayList<String>();
        cList.add("Borås");
        cList.add("Göteborg");
        cList.add("Stockholm");
        cList.add("Växjö");

        ArrayAdapter<String> CityAdr=new ArrayAdapter<String>(this,
                android.R.layout.simple_list_item_1,cList);
        CityAdr.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        citySpinner.setAdapter(CityAdr);


        final List<String> sList=new ArrayList<String>();
        sList.add("City Gross");
        sList.add("Coop Extra");
        sList.add("Ica Maxi");
        sList.add("Willys");

        ArrayAdapter<String> StoreAdr=new ArrayAdapter<String>(this,
                android.R.layout.simple_list_item_1,sList);
        StoreAdr.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        storeSpinner.setAdapter(StoreAdr);
        categories = JsonManager.getCategories();
        for(Categories cat : categories){
        Log.i("hej", cat.getName().toString());

        cat1text.setText(categories.get(0).getName().toString());
        cat2text.setText(categories.get(1).getName().toString());
        cat3text.setText(categories.get(2).getName().toString());
        cat4text.setText(categories.get(3).getName().toString());
        }
        createFruktAdapter();
        createCharkAdapter();
        createMejeriAdapter();
        createGodisAdapter();

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
    private void createFruktAdapter(){
        if(!categories.isEmpty()) {
            fruktAdapterCreated = true;
            FruktAdapter fruktAdapter = new FruktAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = fruktAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = fruktAdapter.getView(i, null, null);
                cat1.addView(item);
            }
        }
    }
    private void createCharkAdapter(){
        if(!categories.isEmpty()) {
            charkAdapterCreated = true;
            CharkAdapter charkAdapter = new CharkAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = charkAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = charkAdapter.getView(i, null, null);
                cat2.addView(item);
            }
        }
    }
    private void createMejeriAdapter(){
        if(!categories.isEmpty()) {
            mejeriAdapterCreated = true;
            MejeriAdapter mejeriAdapter = new MejeriAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = mejeriAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = mejeriAdapter.getView(i, null, null);
                cat3.addView(item);
            }
        }
    }
    private void createGodisAdapter(){
        if(!categories.isEmpty()) {
            godisAdapterCreated = true;
            GodisAdapter godisAdapter = new GodisAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = godisAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = godisAdapter.getView(i, null, null);
                cat4.addView(item);
            }
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

