package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-11.
 */
public class FBags {
    private int id;
    private String name;
    private ArrayList<FBags> bagList;


    public FBags(int id, String name, ArrayList<FBags> bagList){
        this.id = id;
        this.name = name;
        this.bagList = bagList;
    }

    public FBags(int id, String name){
        this.id = id;
        this.name = name;
    }

    public FBags(){
    }

    public ArrayList<FBags> getbagList() {
        return bagList;
    }

    public void setbagList(ArrayList<FBags> bagList) {
        this.bagList = bagList;
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

