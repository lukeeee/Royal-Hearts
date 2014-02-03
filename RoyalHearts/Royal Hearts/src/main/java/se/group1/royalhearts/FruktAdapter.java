package se.group1.royalhearts;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.CheckBox;
import android.widget.TextView;

import java.util.ArrayList;


/**
 * Created by Lukas on 2014-01-30.
 */
public class FruktAdapter extends BaseAdapter {
    ArrayList<Categories> categories;
    Context context;



    public FruktAdapter(Context context, View.OnClickListener myTurnsListener){
        this.context = context;
        this.categories = (ArrayList) JsonManager.getCategories();
    }

    @Override
    public int getCount() {
        return categories.size();
    }

    @Override
    public Object getItem(int i) {
        return categories.get(i);
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

        holder.groText = (TextView)v.findViewById(R.id.groText);
        holder.cBox = (CheckBox)v.findViewById(R.id.cBox);
        Categories cat = JsonManager.getCategories().get(i);

        holder.groText.setText(cat.getName().toString());
        holder.cBox.setTag(cat.getName());
        v.setTag(categories.get(i));

        return v;
    }
}

