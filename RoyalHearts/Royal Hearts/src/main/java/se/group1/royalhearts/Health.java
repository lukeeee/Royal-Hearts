package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-04.
 */

public class Health {
    private int id;
    private String name;
    private ArrayList<Health> HealthList;


    public Health(int id, String name, ArrayList<Health> HealthList){
        this.id = id;
        this.name = name;
        this.HealthList = HealthList;
    }

    public Health(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Health(){
    }

    public ArrayList<Health> getHealthList() {
        return HealthList;
    }

    public void setHealthList(ArrayList<Health> HealthList) {
        this.HealthList = HealthList;
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