package se.group1.royalhearts;

import android.content.Context;
import android.graphics.Typeface;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-03.
 */
public class MeatAdapter extends BaseAdapter {
    ArrayList<Meats> meats;
    Context context;



    public MeatAdapter(Context context, View.OnClickListener myTurnsListener){
        this.context = context;
        this.meats = (ArrayList) JsonManager.getMeats();
    }

    @Override
    public int getCount() {
        return meats.size();
    }

    @Override
    public Object getItem(int i) {
        return meats.get(i);
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

        holder.groText = (TextView)v.findViewById(R.id.groText);
        holder.groText.setTypeface(tf);
        holder.addbtn = (Button)v.findViewById(R.id.addBtn);
        Meats mea = JsonManager.getMeats().get(i);

        holder.groText.setText(mea.getName().toString());
        holder.addbtn.setTag(mea.getName());
        v.setTag(meats.get(i));

        return v;
    }
}