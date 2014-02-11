package se.group1.royalhearts;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;

import se.group1.royalhearts.Json.GetAllCategories;
import se.group1.royalhearts.Json.GetAllCities;
import se.group1.royalhearts.Json.GetAllDairies;
import se.group1.royalhearts.Json.GetAllDairybaskets;
import se.group1.royalhearts.Json.GetAllJunkbaskets;
import se.group1.royalhearts.Json.GetAllJunkfoods;
import se.group1.royalhearts.Json.GetAllMeatbaskets;
import se.group1.royalhearts.Json.GetAllMeats;
import se.group1.royalhearts.Json.GetAllVeglists;
import se.group1.royalhearts.Json.GetAllVegetables;
import se.group1.royalhearts.Json.GetStoresByCity;


public class JsonManager {

    public static ArrayList<Dairies> dairies = new ArrayList<Dairies>();
    public static ArrayList<Vegetables> vegetables = new ArrayList<Vegetables>();
    public static ArrayList<Categories> categories = new ArrayList<Categories>();
    public static ArrayList<Meats> meats = new ArrayList<Meats>();
    public static ArrayList<Junkfoods> junkfoods = new ArrayList<Junkfoods>();
    public static ArrayList<Cities> cities = new ArrayList<Cities>();
    public static ArrayList<Stores> stores = new ArrayList<Stores>();
    public static ArrayList<Dairybaskets> dairybaskets = new ArrayList<Dairybaskets>();
    public static ArrayList<Meatbaskets> meatbaskets = new ArrayList<Meatbaskets>();
    public static ArrayList<Junkfoodbaskets> junkfoodbaskets = new ArrayList<Junkfoodbaskets>();
    public static ArrayList<Veglists> veglists = new ArrayList<Veglists>();

    public static void updateEverything() {
        try {
            updateMeats();
            updateDairies();
            updateVegetables();
            updateCategories();
            updateJunkfoods();
            updateCities();
            updateStores(1);
            updateDairybaskets(1);
            updateMeatbaskets(1);
            updateJunkfoodbaskets(1);
            updateVeglists();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }


    public static void updateCategories() throws IOException, JSONException {
        GetAllCategories task = new GetAllCategories();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall");
    }
    public static void updateVegetables() throws IOException, JSONException {
        GetAllVegetables task = new GetAllVegetables();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/getbycat/2");
    }
    public static void updateDairies() throws IOException, JSONException {
        GetAllDairies task = new GetAllDairies();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/getbycat/5");
    }
    public static void updateMeats() throws IOException, JSONException {
        GetAllMeats task = new GetAllMeats();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/getbycat/3");
    }
    public static void updateJunkfoods() throws IOException, JSONException {
        GetAllJunkfoods task = new GetAllJunkfoods();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/getbycat/4");
    }
    public static void updateCities() throws IOException, JSONException {
        GetAllCities task = new GetAllCities();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/city/getall");
    }
    public static void updateStores(int cityId) throws IOException, JSONException {
        GetStoresByCity task = new GetStoresByCity();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/store/getbycity/" + cityId);
    }
    public static void updateDairybaskets(int userId) throws IOException, JSONException {
        GetAllDairybaskets task = new GetAllDairybaskets();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/5/" + userId);
    }
    public static void updateMeatbaskets(int userId) throws IOException, JSONException {
        GetAllMeatbaskets task = new GetAllMeatbaskets();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/3/" + userId);
    }
    public static void updateJunkfoodbaskets(int userId) throws IOException, JSONException {
        GetAllJunkbaskets task = new GetAllJunkbaskets();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/4/" + userId);
    }
    public static void updateVeglists() throws IOException, JSONException {
        GetAllVeglists task = new GetAllVeglists();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/2/18");
    }


    public static ArrayList<Categories> getCategories() {
        try {
            updateCategories();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return categories;
    }
    public static ArrayList<Vegetables> getVegetables() {
        try {
            updateVegetables();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return vegetables;
    }
    public static ArrayList<Dairies> getDairies() {
        try {
            updateDairies();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return dairies;
    }
    public static ArrayList<Meats> getMeats() {
        try {
            updateMeats();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return meats;
    }
    public static ArrayList<Junkfoods> getJunkfoods() {
        try {
            updateJunkfoods();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return junkfoods;
    }
    public static ArrayList<Cities> getCities() {
        try {
            updateCities();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return cities;
    }
    public static ArrayList<Stores> getStores() {
        try {
            updateStores(1);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return stores;
    }
    public static ArrayList<Dairybaskets> getDairybaskets() {
        try {
            updateDairybaskets(1);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return dairybaskets;
    }
    public static ArrayList<Meatbaskets> getMeatbaskets() {
        try {
            updateMeatbaskets(1);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return meatbaskets;
    }
    public static ArrayList<Junkfoodbaskets> getJunkfoodbaskets() {
        try {
            updateJunkfoodbaskets(1);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return junkfoodbaskets;
    }
    public static ArrayList<Veglists> getVeglists() {
        try {
            updateVeglists();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return veglists;
    }


    public static ArrayList<Categories> getCategoriesFromJson(String json) {
        try {

            JSONArray CategoriesArr = new JSONArray(json);
            ArrayList<Categories> listToReturn = new ArrayList<Categories>();

            for (int i = 0; i < CategoriesArr.length(); i++) {
                JSONObject royalHeartObj = CategoriesArr.getJSONObject(i);

                int categoryId = royalHeartObj.getInt("id");
                String categoryName = royalHeartObj.getString("name");
                listToReturn.add(new Categories(categoryId, categoryName));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<Vegetables> getVegetablesFromJson(String json) {
        try {

            JSONArray VegetablesArr = new JSONArray(json);
            ArrayList<Vegetables> listToReturn = new ArrayList<Vegetables>();

            for (int i = 0; i < VegetablesArr.length(); i++) {
                JSONObject royalHeartObj = VegetablesArr.getJSONObject(i);


                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new Vegetables(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<Dairies> getDairiesFromJson(String json) {
        try {

            JSONArray DairiesArr = new JSONArray(json);
            ArrayList<Dairies> listToReturn = new ArrayList<Dairies>();

            for (int i = 0; i < DairiesArr.length(); i++) {
                JSONObject royalHeartObj = DairiesArr.getJSONObject(i);


                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new Dairies(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<Meats> getMeatsFromJson(String json) {
        try {

            JSONArray MeatsArr = new JSONArray(json);
            ArrayList<Meats> listToReturn = new ArrayList<Meats>();

            for (int i = 0; i < MeatsArr.length(); i++) {
                JSONObject royalHeartObj = MeatsArr.getJSONObject(i);


                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new Meats(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<Junkfoods> getJunkfoodsFromJson(String json) {
        try {

            JSONArray JunkfoodsArr = new JSONArray(json);
            ArrayList<Junkfoods> listToReturn = new ArrayList<Junkfoods>();

            for (int i = 0; i < JunkfoodsArr.length(); i++) {
                JSONObject royalHeartObj = JunkfoodsArr.getJSONObject(i);


                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new Junkfoods(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<Cities> getCitiesFromJson(String json) {
        try {

            JSONArray CitiesArr = new JSONArray(json);
            ArrayList<Cities> listToReturn = new ArrayList<Cities>();

            for (int i = 0; i < CitiesArr.length(); i++) {
                JSONObject royalHeartObj = CitiesArr.getJSONObject(i);


                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new Cities(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<Stores> getStoresFromJson(String json) {
        try {

            JSONArray StoresArr = new JSONArray(json);
            ArrayList<Stores> listToReturn = new ArrayList<Stores>();

            for (int i = 0; i < StoresArr.length(); i++) {
                JSONObject royalHeartObj = StoresArr.getJSONObject(i);


                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new Stores(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<Dairybaskets> getDairybasketsFromJson(String json) {
        try {

            JSONArray daibasketsArr = new JSONArray(json);
            ArrayList<Dairybaskets> listToReturn = new ArrayList<Dairybaskets>();

            for (int i = 0; i < daibasketsArr.length(); i++) {
                JSONObject royalHeartObj = daibasketsArr.getJSONObject(i);


                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new Dairybaskets(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<Meatbaskets> getMeatbasketsFromJson(String json) {
        try {

            JSONArray MeatbasketsArr = new JSONArray(json);
            ArrayList<Meatbaskets> listToReturn = new ArrayList<Meatbaskets>();

            for (int i = 0; i < MeatbasketsArr.length(); i++) {
                JSONObject royalHeartObj = MeatbasketsArr.getJSONObject(i);


                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new Meatbaskets(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<Junkfoodbaskets> getJunkfoodbasketsFromJson(String json) {
        try {

            JSONArray JunkbasketsArr = new JSONArray(json);
            ArrayList<Junkfoodbaskets> listToReturn = new ArrayList<Junkfoodbaskets>();

            for (int i = 0; i < JunkbasketsArr.length(); i++) {
                JSONObject royalHeartObj = JunkbasketsArr.getJSONObject(i);


                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new Junkfoodbaskets(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<Veglists> getVeglistsFromJson(String json) {
        try {

            JSONArray VeglistsArr = new JSONArray(json);
            ArrayList<Veglists> listToReturn = new ArrayList<Veglists>();

            for (int i = 0; i < VeglistsArr.length(); i++) {
                JSONObject royalHeartObj = VeglistsArr.getJSONObject(i);


                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new Veglists(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }

}
