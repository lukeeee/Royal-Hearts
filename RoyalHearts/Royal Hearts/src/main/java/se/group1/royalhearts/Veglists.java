package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-10.
 */
public class Veglists {
    private int id;
    private String name;
    private ArrayList<Veglists> vegBasList;


    public Veglists(int id, String name, ArrayList<Veglists> vegBasList){
        this.id = id;
        this.name = name;
        this.vegBasList = vegBasList;
    }

    public Veglists(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Veglists(){
    }

    public ArrayList<Veglists> getVegBasList() {
        return vegBasList;
    }

    public void setVegBasList(ArrayList<Veglists> vegBasList) {
        this.vegBasList = vegBasList;
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
