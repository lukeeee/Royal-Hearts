package se.group1.royalhearts;

import android.content.Context;
import android.database.DataSetObserver;
import android.graphics.Typeface;
import android.util.TypedValue;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.SpinnerAdapter;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-03.
 */
public class StoreAdapter implements SpinnerAdapter {
    ArrayList<Stores> stores;
    Context context;


    public StoreAdapter(Context context, ArrayList<Stores> stores){
        this.context = context;
        this.stores = stores;
    }


    @Override
    public int getCount() {
        return stores.size();
    }

    @Override
    public Object getItem(int position) {
        return null;
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }


    @Override
    public int getItemViewType(int position) {
        return 0;
    }

    @Override
    public int getViewTypeCount() {
        return 1;
    }

    @Override
    public boolean hasStableIds() {
        return false;
    }

    @Override
    public boolean isEmpty() {
        return false;
    }

    @Override
    public View getDropDownView(int position, View convertView, ViewGroup parent) {
        if (convertView == null) {
            LayoutInflater vi = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = vi.inflate(android.R.layout.simple_spinner_dropdown_item, null);
        }
        ((TextView) convertView).setText(stores.get(position).getName());
        ((TextView) convertView).setTextSize(TypedValue.COMPLEX_UNIT_SP, 25);
        Typeface tf = Typeface.createFromAsset(context.getAssets(),
                "fonts/Locked.ttf");
        ((TextView) convertView).setTypeface(tf);
        return convertView;

    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        TextView textView = (TextView) View.inflate(context, android.R.layout.simple_spinner_item, null);
        textView.setText(stores.get(position).getName());
        textView.setTextSize(TypedValue.COMPLEX_UNIT_SP, 20);
        Typeface tf = Typeface.createFromAsset(context.getAssets(),
                "fonts/Locked.ttf");
        textView.setTypeface(tf);
        return textView;
    }


    @Override
    public void registerDataSetObserver(DataSetObserver observer) {

    }

    @Override
    public void unregisterDataSetObserver(DataSetObserver observer) {

    }

    public ArrayList<Stores> getStores() {
        return stores;
    }

}