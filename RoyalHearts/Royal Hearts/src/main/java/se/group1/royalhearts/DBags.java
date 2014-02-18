package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-17.
 */
public class DBags {
    private int id;
    private String name;
    private ArrayList<DBags> dbagList;


    public DBags(int id, String name, ArrayList<DBags> dbagList){
        this.id = id;
        this.name = name;
        this.dbagList = dbagList;
    }

    public DBags(int id, String name){
        this.id = id;
        this.name = name;
    }

    public DBags(){
    }

    public ArrayList<DBags> getdbagList() {
        return dbagList;
    }

    public void setdbagList(ArrayList<DBags> dbagList) {
        this.dbagList = dbagList;
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

