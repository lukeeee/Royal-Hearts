package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-11.
 */
public class JBags {
    private int id;
    private String name;
    private ArrayList<JBags> jbagList;


    public JBags(int id,int catId, String name, ArrayList<JBags> jbagList){
        this.id = id;
        this.name = name;
        this.jbagList = jbagList;
    }

    public JBags(int id, String name){
        this.id = id;
        this.name = name;
    }

    public JBags(){
    }

    public ArrayList<JBags> getjbagList() {
        return jbagList;
    }

    public void setjbagList(ArrayList<JBags> jbagList) {
        this.jbagList = jbagList;
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

