package se.group1.royalhearts;

import android.content.Context;
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

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-17.
 */
public class MBagAdapter extends BaseAdapter {
    ArrayList<MBags> mbags;
    Context context;



    public MBagAdapter(Context context){
        this.context = context;
        this.mbags = (ArrayList) JsonManager.getMBags();
    }

    @Override
    public int getCount() {
        return mbags.size();
    }

    @Override
    public Object getItem(int i) {
        return mbags.get(i);
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
        if (v == null) {
            LayoutInflater infalInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            v = infalInflater.inflate(R.layout.categories_adapter, null);
        }
        holder = new ViewHolder();
        v.setTag(holder);
        for(MBags ba : mbags){
            Log.i("sillar", ba.getName().toString());
            Log.i("sillar", Integer.toString(ba.getId()));
        }

        holder.groText = (TextView)v.findViewById(R.id.grocText);
        holder.cBox = (CheckBox)v.findViewById(R.id.cBox);
        MBags baga = JsonManager.getMBags().get(i);
        fade_out = AnimationUtils.loadAnimation(context.getApplicationContext(), R.anim.fade_out);
        fade_in = AnimationUtils.loadAnimation(context.getApplicationContext(), R.anim.fade_in);



        holder.groText.setText(baga.getName());
        holder.cBox.setTag(baga.getName());
        v.setTag(mbags.get(i));
        holder.cBox.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (isChecked == true) {
                    holder.groText.startAnimation(fade_out);
                } else {
                    holder.groText.startAnimation(fade_in);
                }

            }
        });

        return v;
    }
}