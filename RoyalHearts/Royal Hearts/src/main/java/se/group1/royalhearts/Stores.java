package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-04.
 */
public class Stores {
    private int id;
    private String name;
    private ArrayList<Stores> storeList;


    public Stores(int id, String name, ArrayList<Stores> storeList){
        this.id = id;
        this.name = name;
        this.storeList = storeList;
    }

    public Stores(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Stores(){
    }

    public ArrayList<Stores> getStoreList() {
        return storeList;
    }

    public void setStoreList(ArrayList<Stores> storeList) {
        this.storeList = storeList;
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