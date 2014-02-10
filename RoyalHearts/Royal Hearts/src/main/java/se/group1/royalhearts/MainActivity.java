package se.group1.royalhearts;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.LinearLayout;
import android.widget.Spinner;
import android.widget.TextView;

import org.json.JSONException;

import java.io.IOException;
import java.util.ArrayList;

public class MainActivity extends Activity implements AdapterView.OnItemSelectedListener {

    private ProgressDialog progressDialog;
    private TextView kasse,cat1text,cat2text,cat3text,cat4text;
    private Spinner storeSpinner;
    private Spinner citySpinner;
    private ArrayList<Categories> categories;
    private ArrayList<Veglists> vegetable;
    private ArrayList<Dairybaskets> dairies;
    private ArrayList<Meatbaskets> meats;
    private ArrayList<Junkfoodbaskets> junkfoods;
    private ArrayList<Cities> cities;
    private ArrayList<Stores> stores;
    LinearLayout cat1,cat2,cat3,cat4;
    boolean vegbasketAdapterCreated = false;
    boolean meatAdapterCreated = false;
    boolean dairyAdapterCreated = false;
    boolean junkfoodAdapterCreated = false;

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

        cities = JsonManager.getCities();
        CityAdapter cityAdapter = new CityAdapter(this, cities);

        citySpinner.setAdapter(cityAdapter);

        stores = JsonManager.getStores();
        StoreAdapter storeAdapter = new StoreAdapter(this, stores);
        storeSpinner.setAdapter(storeAdapter);

        /*cityId = citySpinner.getId();
        for(Cities city : cities){
        Log.i("hej", Integer.toString(city.getId()));
        }*/
        Log.i("dralban", Integer.toString(HelperClass.User.userId));
        Log.i("dralban", HelperClass.User.userName);

        categories = JsonManager.getCategories();
        vegetable = JsonManager.getVeglists();
        for (Junkfoodbaskets junks : junkfoods){
            Log.i("frukta", junks.getName().toString());
        }
        dairies = JsonManager.getDairybaskets();
        meats = JsonManager.getMeatbaskets();
        junkfoods = JsonManager.getJunkfoodbaskets();



        for(Categories cat : categories){
            Log.i("hej", cat.getName().toString());
            cat1text.setText(categories.get(0).getName().toString());
            cat2text.setText(categories.get(1).getName().toString());
            cat3text.setText(categories.get(3).getName().toString());
            cat4text.setText(categories.get(2).getName().toString());
        }

        //if (stores.get(position).getId())


        createVegbasketAdapter();
        createMeatAdapter();
        createDairyAdapter();
        createJunkfoodAdapter();
        citySpinner.setOnItemSelectedListener(this);

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
            case R.id.action_add:
                Intent addIntent = new Intent(getBaseContext(), AddProducts.class);
                startActivity(addIntent);
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

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        //Log.i("svaleklev", Integer.toString(cities.get(position).getId()));
        try {
            JsonManager.updateStores(cities.get(position).getId());



        } catch (IOException e) {
            e.printStackTrace();
        } catch (JSONException e) {
            e.printStackTrace();
        }


    }
        private void createVegbasketAdapter(){
        if(!vegetable.isEmpty()) {
            vegbasketAdapterCreated = true;
            VegbasketAdapter vegbasketAdapter = new VegbasketAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = vegbasketAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = vegbasketAdapter.getView(i, null, null);
                cat1.addView(item);
            }
        }
    }
    private void createMeatAdapter(){
        if(!meats.isEmpty()) {
            meatAdapterCreated = true;
            MeatbasketAdapter meatAdapter = new MeatbasketAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = meatAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = meatAdapter.getView(i, null, null);
                cat2.addView(item);
            }
        }
    }
    private void createDairyAdapter(){
        if(!dairies.isEmpty()) {
            dairyAdapterCreated = true;
            DairybasketAdapter dairyAdapter = new DairybasketAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = dairyAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = dairyAdapter.getView(i, null, null);
                cat3.addView(item);
            }
        }
    }
    private void createJunkfoodAdapter(){
        if(!categories.isEmpty()) {
            junkfoodAdapterCreated = true;
            JunkbasketAdapter junkfoodAdapter = new JunkbasketAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = junkfoodAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = junkfoodAdapter.getView(i, null, null);
                cat4.addView(item);
            }
        }
    }


    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }
}


