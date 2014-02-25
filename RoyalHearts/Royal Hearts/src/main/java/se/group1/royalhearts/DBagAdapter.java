package se.group1.royalhearts;

import android.content.Context;
import android.graphics.Typeface;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.BaseAdapter;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-17.
 */
public class DBagAdapter extends BaseAdapter {
    ArrayList<DBags> dbags;
    Context context;



    public DBagAdapter(Context context){
        this.context = context;
        this.dbags = (ArrayList) JsonManager.getDBags();
    }

    @Override
    public int getCount() {
        return dbags.size();
    }

    @Override
    public Object getItem(int i) {
        return dbags.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }
    static class ViewHolder{
        TextView groText;
        CheckBox cBox;
    }

    @Override
    public View getView(int i, View convertView, ViewGroup viewGroup) {
        View v = convertView;
        final ViewHolder holder;
        final Animation fade_out,fade_in;
        final View under;
        if (v == null) {
            LayoutInflater infalInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            v = infalInflater.inflate(R.layout.categories_adapter, null);
        }
        holder = new ViewHolder();
        v.setTag(holder);
        for(DBags ba : dbags){
            Log.i("sillar", ba.getName().toString());
            Log.i("sillar", Integer.toString(ba.getId()));
        }

        holder.groText = (TextView)v.findViewById(R.id.grocText);
        holder.cBox = (CheckBox)v.findViewById(R.id.cBox);
        under = (View)v.findViewById(R.id.underline);
        under.setVisibility(View.INVISIBLE);
        final DBags baga = JsonManager.getDBags().get(i);
        fade_out = AnimationUtils.loadAnimation(context.getApplicationContext(), R.anim.fade_out);
        fade_in = AnimationUtils.loadAnimation(context.getApplicationContext(), R.anim.fade_in);

        Typeface tf = Typeface.createFromAsset(context.getAssets(),
                "fonts/Locked.ttf");
        holder.groText.setTypeface(tf);

        holder.groText.setText(baga.getName());
        holder.cBox.setTag(baga.getName());
        v.setTag(dbags.get(i));
        holder.cBox.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (isChecked == true) {
                    under.setVisibility(View.VISIBLE);
                    under.startAnimation(fade_in);
                    Toast.makeText(context, baga.getName()+", Check", 1000).show();
                    SoundManager.start(R.raw.cash, context);
                } else {
                    under.startAnimation(fade_out);
                }

            }
        });

        return v;
    }
}
