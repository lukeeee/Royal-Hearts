package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-11.
 */
public class HBags {
    private int id;
    private String name;
    private ArrayList<HBags> hbagList;


    public HBags(int id,int catId, String name, ArrayList<HBags> hbagList){
        this.id = id;
        this.name = name;
        this.hbagList = hbagList;
    }

    public HBags(int id, String name){
        this.id = id;
        this.name = name;
    }

    public HBags(){
    }

    public ArrayList<HBags> gethbagList() {
        return hbagList;
    }

    public void sethbagList(ArrayList<HBags> hbagList) {
        this.hbagList = hbagList;
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

