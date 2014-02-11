package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-10.
 */
public class Junkfoodbaskets {
    private int id;
    private String name;
    private ArrayList<Junkfoodbaskets> junkBasList;


    public Junkfoodbaskets(int id, String name, ArrayList<Junkfoodbaskets> junkBasList){
        this.id = id;
        this.name = name;
        this.junkBasList = junkBasList;
    }

    public Junkfoodbaskets(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Junkfoodbaskets(){
    }

    public ArrayList<Junkfoodbaskets> getJunkBasList() {
        return junkBasList;
    }

    public void setJunkBasList(ArrayList<Junkfoodbaskets> JunkBasList) {
        this.junkBasList = JunkBasList;
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