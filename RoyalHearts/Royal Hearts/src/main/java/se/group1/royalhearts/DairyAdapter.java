package se.group1.royalhearts;

import android.content.Context;
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
public class DairyAdapter extends BaseAdapter {
    ArrayList<Dairies> dairies;
    Context context;



    public DairyAdapter(Context context, View.OnClickListener myTurnsListener){
        this.context = context;
        this.dairies = (ArrayList) JsonManager.getDairies();
    }

    @Override
    public int getCount() {
        return dairies.size();
    }

    @Override
    public Object getItem(int i) {
        return dairies.get(i);
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

        holder.groText = (TextView)v.findViewById(R.id.groText);
        holder.addbtn = (Button)v.findViewById(R.id.addBtn);
        Dairies dai = JsonManager.getDairies().get(i);

        holder.groText.setText(dai.getName().toString());
        holder.addbtn.setTag(dai.getName());
        v.setTag(dairies.get(i));

        return v;
    }
}
