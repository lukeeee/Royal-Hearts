package se.group1.royalhearts;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;

import se.group1.royalhearts.Json.GetAllCategories;
import se.group1.royalhearts.Json.GetAllCities;
import se.group1.royalhearts.Json.GetAllDairies;
import se.group1.royalhearts.Json.GetAllJunkfoods;
import se.group1.royalhearts.Json.GetAllMeats;
import se.group1.royalhearts.Json.GetAllVegetables;
import se.group1.royalhearts.Json.GetDBagByUser;
import se.group1.royalhearts.Json.GetFBagByUser;
import se.group1.royalhearts.Json.GetJBagByUser;
import se.group1.royalhearts.Json.GetMBagByUser;
import se.group1.royalhearts.Json.GetStoresByCity;


public class JsonManager {

    public static ArrayList<Dairies> dairies = new ArrayList<Dairies>();
    public static ArrayList<Vegetables> vegetables = new ArrayList<Vegetables>();
    public static ArrayList<Categories> categories = new ArrayList<Categories>();
    public static ArrayList<Meats> meats = new ArrayList<Meats>();
    public static ArrayList<Junkfoods> junkfoods = new ArrayList<Junkfoods>();
    public static ArrayList<Cities> cities = new ArrayList<Cities>();
    public static ArrayList<Stores> stores = new ArrayList<Stores>();
    public static ArrayList<FBags> fbags = new ArrayList<FBags>();
    public static ArrayList<JBags> jbags = new ArrayList<JBags>();
    public static ArrayList<DBags> dbags = new ArrayList<DBags>();
    public static ArrayList<MBags> mbags = new ArrayList<MBags>();

    public static void updateEverything() {
        try {
            updateMeats();
            updateDairies();
            updateVegetables();
            updateCategories();
            updateJunkfoods();
            updateCities();
            updateStores(1);
            updateFBags(1);
            updateJBags(1);
            updateDBags(1);
            updateMBags(1);
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
    public static void updateFBags(int userId) throws IOException, JSONException {
        GetFBagByUser task = new GetFBagByUser();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/2/" + HelperClass.User.userId);
    }
    public static void updateJBags(int userId) throws IOException, JSONException {
        GetJBagByUser task = new GetJBagByUser();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/4/" + HelperClass.User.userId);
    }
    public static void updateDBags(int userId) throws IOException, JSONException {
        GetDBagByUser task = new GetDBagByUser();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/5/" + HelperClass.User.userId);
    }
    public static void updateMBags(int userId) throws IOException, JSONException {
        GetMBagByUser task = new GetMBagByUser();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/3/" + HelperClass.User.userId);
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
    public static ArrayList<FBags> getFBags() {
        try {
            updateFBags(1);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return fbags;
    }
    public static ArrayList<JBags> getJBags() {
        try {
            updateJBags(1);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return jbags;
    }
    public static ArrayList<DBags> getDBags() {
        try {
            updateDBags(1);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return dbags;
    }
    public static ArrayList<MBags> getMBags() {
        try {
            updateMBags(1);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return mbags;
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
    public static ArrayList<FBags> getFBagsFromJson(String json) {
        try {
            JSONObject Bagsobj = new JSONObject(json);
            JSONArray BagsArr = Bagsobj.getJSONArray("items");
            ArrayList<FBags> listToReturn = new ArrayList<FBags>();

            for (int i = 0; i < BagsArr.length(); i++) {
                JSONObject royalHeartObj = BagsArr.getJSONObject(i);

                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new FBags(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<JBags> getJBagsFromJson(String json) {
        try {
            JSONObject Bagsobj = new JSONObject(json);
            JSONArray BagsArr = Bagsobj.getJSONArray("items");
            ArrayList<JBags> listToReturn = new ArrayList<JBags>();

            for (int i = 0; i < BagsArr.length(); i++) {
                JSONObject royalHeartObj = BagsArr.getJSONObject(i);

                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new JBags(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<DBags> getDBagsFromJson(String json) {
        try {
            JSONObject Bagsobj = new JSONObject(json);
            JSONArray BagsArr = Bagsobj.getJSONArray("items");
            ArrayList<DBags> listToReturn = new ArrayList<DBags>();

            for (int i = 0; i < BagsArr.length(); i++) {
                JSONObject royalHeartObj = BagsArr.getJSONObject(i);

                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new DBags(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }
    public static ArrayList<MBags> getMBagsFromJson(String json) {
        try {
            JSONObject Bagsobj = new JSONObject(json);
            JSONArray BagsArr = Bagsobj.getJSONArray("items");
            ArrayList<MBags> listToReturn = new ArrayList<MBags>();

            for (int i = 0; i < BagsArr.length(); i++) {
                JSONObject royalHeartObj = BagsArr.getJSONObject(i);

                int id = royalHeartObj.getInt("id");
                String name = royalHeartObj.getString("name");
                listToReturn.add(new MBags(id, name));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }

}
