package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-04.
 */
public class Meats {
    private int id;
    private String name;
    private ArrayList<Meats> meatList;


    public Meats(int id, String name, ArrayList<Meats> meatList){
        this.id = id;
        this.name = name;
        this.meatList = meatList;
    }

    public Meats(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Meats(){
    }

    public ArrayList<Meats> getMeatList() {
        return meatList;
    }

    public void setMeatList(ArrayList<Meats> meatList) {
        this.meatList = meatList;
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