package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-04.
 */

public class Vegetables {
    private int id;
    private String name;
    private ArrayList<Vegetables> vegetableList;


    public Vegetables(int id, String name, ArrayList<Vegetables> vegetableList){
        this.id = id;
        this.name = name;
        this.vegetableList = vegetableList;
    }

    public Vegetables(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Vegetables(){
    }

    public ArrayList<Vegetables> getVegetableList() {
        return vegetableList;
    }

    public void setVegetableList(ArrayList<Vegetables> vegetableList) {
        this.vegetableList = vegetableList;
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

