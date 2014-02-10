package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-10.
 */
public class Meatbaskets {
    private int id;
    private String name;
    private ArrayList<Meatbaskets> meatBasList;


    public Meatbaskets(int id, String name, ArrayList<Meatbaskets> meatBasList){
        this.id = id;
        this.name = name;
        this.meatBasList = meatBasList;
    }

    public Meatbaskets(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Meatbaskets(){
    }

    public ArrayList<Meatbaskets> getMeatBasList() {
        return meatBasList;
    }

    public void setMeatBasList(ArrayList<Meatbaskets> meatBasList) {
        this.meatBasList = meatBasList;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }
}