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
 * Created by Lukas on 2014-02-03.
 */
public class HealthAdapter extends BaseAdapter {
    ArrayList<Health> health;
    Context context;



    public HealthAdapter(Context context, View.OnClickListener myTurnsListener){
        this.context = context;
        this.health = (ArrayList) JsonManager.getHealths();
    }

    @Override
    public int getCount() {
        return health.size();
    }

    @Override
    public Object getItem(int i) {
        return health.get(i);
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
        final Health hea = JsonManager.getHealths().get(i);

        holder.groText.setText(hea.getName().toString());
        holder.addbtn.setTag(hea.getName());
        v.setTag(health.get(i));
        for(int z = 0; z < 1; z++){
            final int g = z;
            holder.addbtn.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    HelperClass.Item.item_id = hea.getId();

                    JsonManager.addToBag();
                    Log.i("äckligt", Integer.toString(g));
                    Toast.makeText(context, "1 " + hea.getName() +
                            ", har lagts till i din lista", 1000).show();
                    SoundManager.start(R.raw.stapler, context);
                }
            });
        }

        return v;
    }

}