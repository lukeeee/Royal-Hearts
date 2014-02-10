package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-10.
 */
public class Dairybaskets {
    private int id;
    private String name;
    private ArrayList<Dairybaskets> daiBasList;


    public Dairybaskets(int id, String name, ArrayList<Dairybaskets> daiBasList){
        this.id = id;
        this.name = name;
        this.daiBasList = daiBasList;
    }

    public Dairybaskets(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Dairybaskets(){
    }

    public ArrayList<Dairybaskets> getDaiBasList() {
        return daiBasList;
    }

    public void setDaiBasList(ArrayList<Dairybaskets> daiBasList) {
        this.daiBasList = daiBasList;
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