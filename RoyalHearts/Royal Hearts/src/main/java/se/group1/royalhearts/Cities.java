package se.group1.royalhearts;

import java.util.ArrayList;

/**
 * Created by Lukas on 2014-02-04.
 */
public class Cities {
    private int id;
    private String name;
    private ArrayList<Cities> cityList;


    public Cities(int id, String name, ArrayList<Cities> cityList){
        this.id = id;
        this.name = name;
        this.cityList = cityList;
    }

    public Cities(int id, String name){
        this.id = id;
        this.name = name;
    }

    public Cities(){
    }

    public ArrayList<Cities> getCityList() {
        return cityList;
    }

    public void setCityList(ArrayList<Cities> cityList) {
        this.cityList = cityList;
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