package se.group1.royalhearts;

import android.app.Activity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.LinearLayout;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-04.
 */
public class AddProducts extends Activity {

    private TextView pro1text,pro2text,pro3text,pro4text;
    private ArrayList<Categories> categories;
    private ArrayList<Vegetables> vegetables;
    private ArrayList<Dairies> dairies;
    private ArrayList<Meats> meats;
    private ArrayList<Junkfoods> junkfoods;
    LinearLayout pro1,pro2,pro3,pro4;
    boolean vegetableAdapterCreated = false;
    boolean meatAdapterCreated = false;
    boolean dairyAdapterCreated = false;
    boolean junkfoodAdapterCreated = false;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.add_layout);
        pro1text = (TextView)findViewById(R.id.pro1Text);
        pro2text = (TextView)findViewById(R.id.pro2Text);
        pro3text = (TextView)findViewById(R.id.pro3text);
        pro4text = (TextView)findViewById(R.id.pro4text);
        pro1 = (LinearLayout)findViewById(R.id.pro1);
        pro2 = (LinearLayout)findViewById(R.id.pro2);
        pro3 = (LinearLayout)findViewById(R.id.pro3);
        pro4 = (LinearLayout)findViewById(R.id.pro4);

        categories = JsonManager.getCategories();
        vegetables = JsonManager.getVegetables();
        dairies = JsonManager.getDairies();
        meats = JsonManager.getMeats();
        junkfoods = JsonManager.getJunkfoods();

        for(Categories cat : categories){
            Log.i("hej", cat.getName().toString());

            pro1text.setText(categories.get(0).getName().toString());
            pro2text.setText(categories.get(1).getName().toString());
            pro3text.setText(categories.get(3).getName().toString());
            pro4text.setText(categories.get(2).getName().toString());
        }
        for(Vegetables veg : vegetables){
            Log.i("svaleklev", veg.getName().toString());
        }
        createVegetableAdapter();
        createMeatAdapter();
        createDairyAdapter();
        createJunkfoodAdapter();

    }


    private void createVegetableAdapter(){
        if(!vegetables.isEmpty()) {
            vegetableAdapterCreated = true;
            VegetableAdapter vegetableAdapter = new VegetableAdapter(getApplicationContext());

            //});
            final int adapterCount = vegetableAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = vegetableAdapter.getView(i, null, null);
                pro1.addView(item);
            }
        }
    }
    private void createMeatAdapter(){
        if(!meats.isEmpty()) {
            meatAdapterCreated = true;
            MeatAdapter meatAdapter = new MeatAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = meatAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = meatAdapter.getView(i, null, null);
                pro2.addView(item);
            }
        }
    }
    private void createDairyAdapter(){
        if(!dairies.isEmpty()) {
            dairyAdapterCreated = true;
            DairyAdapter dairyAdapter = new DairyAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = dairyAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = dairyAdapter.getView(i, null, null);
                pro3.addView(item);
            }
        }
    }
    private void createJunkfoodAdapter(){
        if(!categories.isEmpty()) {
            junkfoodAdapterCreated = true;
            JunkfoodAdapter junkfoodAdapter = new JunkfoodAdapter(getApplicationContext(), new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                }
            });
            final int adapterCount = junkfoodAdapter.getCount();

            for (int i = 0; i < adapterCount; i++) {
                View item = junkfoodAdapter.getView(i, null, null);
                pro4.addView(item);
            }
        }
    }

}