package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-04.
 */
public class Dairies {
    private int id;
    private String name;
    private ArrayList<Dairies> dairyList;


    public Dairies(int id, String name, ArrayList<Dairies> dairyList){
        this.id = id;
        this.name = name;
        this.dairyList = dairyList;
    }

    public Dairies(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Dairies(){
    }

    public ArrayList<Dairies> getDairyList() {
        return dairyList;
    }

    public void setDairyList(ArrayList<Dairies> dairyList) {
        this.dairyList = dairyList;
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