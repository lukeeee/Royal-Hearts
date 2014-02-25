package se.group1.royalhearts;

import android.content.Context;
import android.graphics.Typeface;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;


/**
 * Created by Lukas on 2014-01-30.
 */
public class VegetableAdapter extends BaseAdapter {
    ArrayList<Vegetables> vegetables;
    Context context;



    public VegetableAdapter(Context context){
        this.context = context;
        this.vegetables = (ArrayList) JsonManager.getVegetables();
    }

    @Override
    public int getCount() {
        return vegetables.size();
    }

    @Override
    public Object getItem(int i) {
        return vegetables.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }
    static class ViewHolder{
        TextView groText;
        Button addbtn;
    }

    @Override
    public View getView(int i, View convertView, ViewGroup viewGroup) {
        View v = convertView;
        ViewHolder holder;
        if (v == null) {
            LayoutInflater infalInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            v = infalInflater.inflate(R.layout.add_adapter, null);
        }
        holder = new ViewHolder();
        v.setTag(holder);
        Typeface tf = Typeface.createFromAsset(context.getAssets(),
                "fonts/Locked.ttf");
        //holder.groText.setTypeface(tf);
        holder.groText = (TextView)v.findViewById(R.id.groText);
        holder.groText.setTypeface(tf);
        holder.addbtn = (Button)v.findViewById(R.id.addBtn);
        final Vegetables veg = JsonManager.getVegetables().get(i);

        holder.groText.setText(veg.getName().toString());
        holder.addbtn.setTag(veg.getName());
        v.setTag(vegetables.get(i));
        holder.addbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //CabinetManager.AddIngredient(getGroup(groupPosition) + ", " + ingredientName);
                HelperClass.Item.item_id = veg.getId();
                JsonManager.addToBag();
                Log.i("Spenat", Integer.toString(HelperClass.Item.item_id)+Integer.toString(HelperClass.User.userId));
                Toast.makeText(context, veg.getName() + ", har lagts till i din lista", 1000).show();
                SoundManager.start(R.raw.stapler, context);
            }
        });

        return v;
    }
}

