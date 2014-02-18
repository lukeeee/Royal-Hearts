package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-17.
 */
public class MBags {
    private int id;
    private String name;
    private ArrayList<MBags> mbagList;


    public MBags(int id, String name, ArrayList<MBags> mbagList){
        this.id = id;
        this.name = name;
        this.mbagList = mbagList;
    }

    public MBags(int id, String name){
        this.id = id;
        this.name = name;
    }

    public MBags(){
    }

    public ArrayList<MBags> getmbagList() {
        return mbagList;
    }

    public void setmbagList(ArrayList<MBags> mbagList) {
        this.mbagList = mbagList;
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

