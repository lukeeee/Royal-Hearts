package se.group1.royalhearts;

import android.content.Context;
import android.graphics.Typeface;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

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
        Typeface tf = Typeface.createFromAsset(context.getAssets(),
                "fonts/Locked.ttf");
        //holder.groText.setTypeface(tf);

        holder.groText = (TextView)v.findViewById(R.id.groText);
        holder.groText.setTypeface(tf);
        holder.addbtn = (Button)v.findViewById(R.id.addBtn);
        final Dairies dai = JsonManager.getDairies().get(i);

        holder.groText.setText(dai.getName().toString());
        holder.addbtn.setTag(dai.getName());
        v.setTag(dairies.get(i));
        holder.addbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                HelperClass.Item.item_id = dai.getId();
                if (HelperClass.Item.item_id == 1){
                    JsonManager.addToBag();
                    Toast.makeText(context, "1 " + dai.getName() +
                            ", har lagts till i din lista", 1000).show();
                    SoundManager.start(R.raw.stapler, context);
                }
            }
        });

        return v;
    }
}

