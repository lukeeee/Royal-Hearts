package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-04.
 */
public class Junkfoods {
    private int id;
    private String name;
    private ArrayList<Junkfoods> junkfoodList;


    public Junkfoods(int id, String name, ArrayList<Junkfoods> junkfoodList){
        this.id = id;
        this.name = name;
        this.junkfoodList = junkfoodList;
    }

    public Junkfoods(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Junkfoods(){
    }

    public ArrayList<Junkfoods> getJunkfoodList() {
        return junkfoodList;
    }

    public void setJunkfoodList(ArrayList<Junkfoods> junkfoodList) {
        this.junkfoodList = junkfoodList;
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
