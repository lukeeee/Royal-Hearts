package se.group1.royalhearts;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Typeface;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.Spinner;
import android.widget.TextView;

import org.json.JSONException;

import java.io.IOException;
import java.util.ArrayList;

public class MainActivity extends Activity implements AdapterView.OnItemSelectedListener, View.OnClickListener {

    private ProgressDialog progressDialog;
    private TextView kasse,cat1text,cat2text,cat3text,cat4text,store,city,cat5text;
    private Spinner storeSpinner;
    private Spinner citySpinner;
    private ArrayList<Categories> categories;
    private ArrayList<Cities> cities;
    private ArrayList<Stores> stores;
    private ArrayList<FBags> fbags;
    private ArrayList<JBags> jbags;
    private ArrayList<DBags> dbags;
    private ArrayList<MBags> mbags;
    private ArrayList<HBags> hbags;
    private Button btnKasse;
    private LinearLayout cat1,cat2,cat3,cat4,cat5;
    private View line_one,line_two,line_three,line_four;
    Animation move_out,fade_in,zoom;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        kasse = (TextView)findViewById(R.id.kasse);
        storeSpinner = (Spinner)findViewById(R.id.StoreSpinner);
        citySpinner= (Spinner) findViewById(R.id.CitySpinner);
        cat1text = (TextView)findViewById(R.id.cat1Text);
        cat2text = (TextView)findViewById(R.id.cat2Text);
        cat3text = (TextView)findViewById(R.id.cat3text);
        cat4text = (TextView)findViewById(R.id.cat4text);
        cat5text = (TextView)findViewById(R.id.cat5text);
        store = (TextView)findViewById(R.id.store);
        city = (TextView)findViewById(R.id.city);
        cat1 = (LinearLayout)findViewById(R.id.cat1);
        cat2 = (LinearLayout)findViewById(R.id.cat2);
        cat3 = (LinearLayout)findViewById(R.id.cat3);
        cat4 = (LinearLayout)findViewById(R.id.cat4);
        cat5 = (LinearLayout)findViewById(R.id.cat5);
        line_one = (View)findViewById(R.id.line_one);
        line_two = (View)findViewById(R.id.line_two);
        line_three = (View)findViewById(R.id.line_three);
        line_four = (View)findViewById(R.id.line_four);
        btnKasse = (Button)findViewById(R.id.btnKasse);
        Typeface tf = Typeface.createFromAsset(getAssets(),
                "fonts/Locked.ttf");

        if (HelperClass.User.userName.endsWith("s")){
            kasse.setText(HelperClass.User.userName + " Inköpslista");
        } else {
            kasse.setText(HelperClass.User.userName + "'s Inköpslista");
        }
        kasse.setTypeface(tf);
        cat4text.setTypeface(tf);
        cat3text.setTypeface(tf);
        cat2text.setTypeface(tf);
        cat1text.setTypeface(tf);
        cat5text.setTypeface(tf);
        btnKasse.setTypeface(tf);
        city.setTypeface(tf);
        store.setTypeface(tf);

        cities = JsonManager.getCities();
        CityAdapter cityAdapter = new CityAdapter(this, cities);
        citySpinner.setAdapter(cityAdapter);

        stores = JsonManager.getStores();
        StoreAdapter storeAdapter = new StoreAdapter(this, stores);
        storeSpinner.setAdapter(storeAdapter);

        btnKasse.setVisibility(View.INVISIBLE);
        store.setVisibility(View.INVISIBLE);
        city.setVisibility(View.INVISIBLE);

        fade_in = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.fading_in);
        move_out = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.move_out);
        zoom = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.zoom);

        categories = JsonManager.getCategories();
        fbags = JsonManager.getFBags();
        jbags = JsonManager.getJBags();
        dbags = JsonManager.getDBags();
        mbags = JsonManager.getMBags();
        hbags = JsonManager.getHBags();



        Log.i("userid", Integer.toString(HelperClass.User.userId));
        Log.i("userid", HelperClass.User.userName);

        citySpinner.setOnItemSelectedListener(this);
        storeSpinner.setOnItemSelectedListener(this);
        btnKasse.setOnClickListener(this);
        setInvisible();
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
                //this.finish();
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
        if(parent == citySpinner) {
            Log.i("anna", "anna");
            if (cities.get(position).getId() == 0){

            }else{

            try {
                JsonManager.updateStores(cities.get(position).getId());
                String svaleklev = String.valueOf(citySpinner.getSelectedItem());
                Log.i("beatbox", svaleklev);

                city.setText(cities.get(position).getName());



            } catch (IOException e) {
                e.printStackTrace();
            } catch (JSONException e) {
                e.printStackTrace();
            }
            }
        } else if(parent == storeSpinner) {

            if(stores.get(position).getId() == 0){

            } else if(stores.get(position).getId() == 1){
                willys();
                setVisible();
                store.setText(stores.get(position).getName());
                animation();
            } else if(stores.get(position).getId() == 2){
                maxi();
                setVisible();
                store.setText(stores.get(position).getName());
                animation();
            } else if(stores.get(position).getId() == 3){
                citygross();
                setVisible();
                store.setText(stores.get(position).getName());
                animation();
            } else if(stores.get(position).getId() == 4){
                citygross();
                setVisible();
                store.setText(stores.get(position).getName());
                animation();
            } else if(stores.get(position).getId() == 15){
                lidl();
                setVisible();
                store.setText(stores.get(position).getName());
                animation();
            }else if(stores.get(position).getId() == 9){
                lidl();
                setVisible();
                store.setText(stores.get(position).getName());
                animation();
            }

        }


    }

    public void setInvisible(){
        cat1text.setVisibility(View.INVISIBLE);
        cat1.setVisibility(View.INVISIBLE);
        cat2text.setVisibility(View.INVISIBLE);
        cat2.setVisibility(View.INVISIBLE);
        cat3text.setVisibility(View.INVISIBLE);
        cat3.setVisibility(View.INVISIBLE);
        cat4text.setVisibility(View.INVISIBLE);
        cat4.setVisibility(View.INVISIBLE);
        cat5text.setVisibility(View.INVISIBLE);
        cat5.setVisibility(View.INVISIBLE);
        line_one.setVisibility(View.INVISIBLE);
        line_two.setVisibility(View.INVISIBLE);
        line_three.setVisibility(View.INVISIBLE);
        line_four.setVisibility(View.INVISIBLE);
    }
    public void setVisible(){
        cat1text.setVisibility(View.VISIBLE);
        cat1text.startAnimation(zoom);
        cat1.setVisibility(View.VISIBLE);
        cat1.startAnimation(zoom);
        cat2text.setVisibility(View.VISIBLE);
        cat2text.startAnimation(zoom);
        cat2.setVisibility(View.VISIBLE);
        cat2.startAnimation(zoom);
        cat3text.setVisibility(View.VISIBLE);
        cat3text.startAnimation(zoom);
        cat3.setVisibility(View.VISIBLE);
        cat3.startAnimation(zoom);
        cat4text.setVisibility(View.VISIBLE);
        cat4text.startAnimation(zoom);
        cat4.setVisibility(View.VISIBLE);
        cat4.startAnimation(zoom);
        cat5text.setVisibility(View.VISIBLE);
        cat5text.startAnimation(zoom);
        cat5.setVisibility(View.VISIBLE);
        cat5.startAnimation(zoom);
        line_one.setVisibility(View.VISIBLE);
        line_one.startAnimation(zoom);
        line_two.setVisibility(View.VISIBLE);
        line_two.startAnimation(zoom);
        line_three.setVisibility(View.VISIBLE);
        line_three.startAnimation(zoom);
        line_four.setVisibility(View.VISIBLE);
        line_four.startAnimation(zoom);
    }
    public void animation(){
        storeSpinner.setVisibility(View.GONE);
        citySpinner.setVisibility(View.GONE);
        store.setVisibility(View.VISIBLE);
        store.startAnimation(fade_in);
        btnKasse.setVisibility(View.VISIBLE);
        btnKasse.startAnimation(fade_in);
        city.setVisibility(View.VISIBLE);
        city.startAnimation(fade_in);
    }

    public void willys(){
        for(Categories cat : categories){
            Log.i("hej", cat.getName().toString());
            cat1text.setText(categories.get(0).getName().toString());
            cat2text.setText(categories.get(1).getName().toString());
            cat3text.setText(categories.get(3).getName().toString());
            cat4text.setText(categories.get(2).getName().toString());
            cat5text.setText(categories.get(4).getName().toString());
        }
        JBagAdapter jbagAdapter = new JBagAdapter(getApplicationContext());
        final int jadapterCount = jbagAdapter.getCount();
        for (int i = 0; i < jadapterCount; i++) {
            View item = jbagAdapter.getView(i, null, null);
            cat4.addView(item);
        }
        DBagAdapter dbagAdapter = new DBagAdapter(getApplicationContext());
        final int dadapterCount = dbagAdapter.getCount();
        for (int i = 0; i < dadapterCount; i++) {
            View item = dbagAdapter.getView(i, null, null);
            cat3.addView(item);
        }
        MBagAdapter mbagAdapter = new MBagAdapter(getApplicationContext());
        final int madapterCount = mbagAdapter.getCount();
        for (int i = 0; i < madapterCount; i++) {
            View item = mbagAdapter.getView(i, null, null);
            cat2.addView(item);
        }
        FBagAdapter fbagAdapter = new FBagAdapter(getApplicationContext());
        final int adapterCount = fbagAdapter.getCount();
        for (int i = 0; i < adapterCount; i++) {
            View item = fbagAdapter.getView(i, null, null);
            cat1.addView(item);
        }
        HBagAdapter hbagAdapter = new HBagAdapter(getApplicationContext());
        final int hadapterCount = hbagAdapter.getCount();
        for (int i = 0; i < adapterCount; i++) {
            View item = hbagAdapter.getView(i, null, null);
            cat5.addView(item);
        }
    }
    public void maxi(){
        for(Categories cat : categories){
            Log.i("hej", cat.getName().toString());
            cat1text.setText(categories.get(4).getName().toString());
            cat2text.setText(categories.get(1).getName().toString());
            cat3text.setText(categories.get(2).getName().toString());
            cat4text.setText(categories.get(3).getName().toString());
            cat5text.setText(categories.get(0).getName().toString());
        }
        JBagAdapter jbagAdapter = new JBagAdapter(getApplicationContext());
        final int jadapterCount = jbagAdapter.getCount();
        for (int i = 0; i < jadapterCount; i++) {
            View item = jbagAdapter.getView(i, null, null);
            cat4.addView(item);
        }
        DBagAdapter dbagAdapter = new DBagAdapter(getApplicationContext());
        final int dadapterCount = dbagAdapter.getCount();
        for (int i = 0; i < dadapterCount; i++) {
            View item = dbagAdapter.getView(i, null, null);
            cat1.addView(item);
        }
        MBagAdapter mbagAdapter = new MBagAdapter(getApplicationContext());
        final int madapterCount = mbagAdapter.getCount();
        for (int i = 0; i < madapterCount; i++) {
            View item = mbagAdapter.getView(i, null, null);
            cat3.addView(item);
        }
        FBagAdapter fbagAdapter = new FBagAdapter(getApplicationContext());
        final int adapterCount = fbagAdapter.getCount();
        for (int i = 0; i < adapterCount; i++) {
            View item = fbagAdapter.getView(i, null, null);
            cat2.addView(item);
        }
        HBagAdapter hbagAdapter = new HBagAdapter(getApplicationContext());
        final int hadapterCount = hbagAdapter.getCount();
        for (int i = 0; i < adapterCount; i++) {
            View item = hbagAdapter.getView(i, null, null);
            cat5.addView(item);
        }
    }
    public void citygross(){
        for(Categories cat : categories){
            Log.i("hej", cat.getName().toString());
            cat1text.setText(categories.get(2).getName().toString());
            cat2text.setText(categories.get(0).getName().toString());
            cat3text.setText(categories.get(1).getName().toString());
            cat4text.setText(categories.get(3).getName().toString());
            cat5text.setText(categories.get(4).getName().toString());
        }
        JBagAdapter jbagAdapter = new JBagAdapter(getApplicationContext());
        final int jadapterCount = jbagAdapter.getCount();
        for (int i = 0; i < jadapterCount; i++) {
            View item = jbagAdapter.getView(i, null, null);
            cat1.addView(item);
        }
        DBagAdapter dbagAdapter = new DBagAdapter(getApplicationContext());
        final int dadapterCount = dbagAdapter.getCount();
        for (int i = 0; i < dadapterCount; i++) {
            View item = dbagAdapter.getView(i, null, null);
            cat4.addView(item);
        }
        MBagAdapter mbagAdapter = new MBagAdapter(getApplicationContext());
        final int madapterCount = mbagAdapter.getCount();
        for (int i = 0; i < madapterCount; i++) {
            View item = mbagAdapter.getView(i, null, null);
            cat3.addView(item);
        }
        FBagAdapter fbagAdapter = new FBagAdapter(getApplicationContext());
        final int adapterCount = fbagAdapter.getCount();
        for (int i = 0; i < adapterCount; i++) {
            View item = fbagAdapter.getView(i, null, null);
            cat2.addView(item);
        }
        HBagAdapter hbagAdapter = new HBagAdapter(getApplicationContext());
        final int hadapterCount = hbagAdapter.getCount();
        for (int i = 0; i < hadapterCount; i++) {
            View item = hbagAdapter.getView(i, null, null);
            cat5.addView(item);
        }
    }
    public void lidl(){
        for(Categories cat : categories){
            Log.i("hej", cat.getName().toString());
            cat1text.setText(categories.get(2).getName().toString());
            cat2text.setText(categories.get(0).getName().toString());
            cat3text.setText(categories.get(3).getName().toString());
            cat4text.setText(categories.get(1).getName().toString());
            cat5text.setText(categories.get(4).getName().toString());
        }
        JBagAdapter jbagAdapter = new JBagAdapter(getApplicationContext());
        final int jadapterCount = jbagAdapter.getCount();
        for (int i = 0; i < jadapterCount; i++) {
            View item = jbagAdapter.getView(i, null, null);
            cat1.addView(item);
        }
        DBagAdapter dbagAdapter = new DBagAdapter(getApplicationContext());
        final int dadapterCount = dbagAdapter.getCount();
        for (int i = 0; i < dadapterCount; i++) {
            View item = dbagAdapter.getView(i, null, null);
            cat3.addView(item);
        }
        MBagAdapter mbagAdapter = new MBagAdapter(getApplicationContext());
        final int madapterCount = mbagAdapter.getCount();
        for (int i = 0; i < madapterCount; i++) {
            View item = mbagAdapter.getView(i, null, null);
            cat4.addView(item);
        }
        FBagAdapter fbagAdapter = new FBagAdapter(getApplicationContext());
        final int adapterCount = fbagAdapter.getCount();
        for (int i = 0; i < adapterCount; i++) {
            View item = fbagAdapter.getView(i, null, null);
            cat2.addView(item);
        }
        HBagAdapter hbagAdapter = new HBagAdapter(getApplicationContext());
        final int hadapterCount = hbagAdapter.getCount();
        for (int i = 0; i < adapterCount; i++) {
            View item = hbagAdapter.getView(i, null, null);
            cat5.addView(item);
        }
    }


    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }

    @Override
    public void onClick(View v) {
        if (v == btnKasse){
            Intent intent = getIntent();
            overridePendingTransition(0, 0);
            intent.addFlags(Intent.FLAG_ACTIVITY_NO_ANIMATION);
            finish();
            overridePendingTransition(0, 0);
            startActivity(intent);
            showProgressDialog();

        }
    }
}


