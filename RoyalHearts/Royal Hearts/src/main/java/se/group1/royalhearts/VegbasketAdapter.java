package se.group1.royalhearts;

import android.content.Context;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.CheckBox;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-10.
 */
public class VegbasketAdapter extends BaseAdapter {
    ArrayList<Veglists> veglists;
    Context context;



    public VegbasketAdapter(Context context, View.OnClickListener myTurnsListener){
        this.context = context;
        this.veglists = (ArrayList) JsonManager.getVeglists();
    }

    @Override
    public int getCount() {
        return veglists.size();
    }

    @Override
    public Object getItem(int i) {
        return veglists.get(i);
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
        ViewHolder holder;
        if (v == null) {
            LayoutInflater infalInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            v = infalInflater.inflate(R.layout.categories_adapter, null);
        }
        holder = new ViewHolder();
        v.setTag(holder);

        holder.groText = (TextView)v.findViewById(R.id.grocText);
        holder.cBox = (CheckBox)v.findViewById(R.id.cBox);
        Veglists vege = JsonManager.getVeglists().get(i);

        holder.groText.setText(vege.getName().toString());
        Log.i("dream", vege.getName().toString());
        holder.cBox.setTag(vege.getName());
        v.setTag(veglists.get(i));

        return v;
    }
}