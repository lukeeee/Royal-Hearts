package se.group1.royalhearts;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.util.Log;

import se.group1.royalhearts.Json.GetAllCategories;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;


public class JsonManager {

    //public static ArrayList<Cocktail> allCocktails = new ArrayList<Cocktail>();
    //public static ArrayList<Cocktail> availableCocktails = new ArrayList<Cocktail>();
    public static ArrayList<Categories> categories = new ArrayList<Categories>();
    //public static ArrayList<Ingredient> ingredients = new ArrayList<Ingredient>();
    //public static ArrayList<Ingredient> ingredientsByUser = new ArrayList<Ingredient>();
   // public static ArrayList<Cocktail> drinkByFavorite = new ArrayList<Cocktail>();

    public static void updateEverything() {
        try {
            //updateAllCocktails();
            //updateAvailableCocktails();
            //updateIngredients();
            updateCategories();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }


    public static void updateCategories() throws IOException, JSONException {
        GetAllCategories task = new GetAllCategories();
        task.execute("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall");
    }

    public static ArrayList<Categories> getCategories() {
        try {
            updateCategories();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return categories;
    }


    public static ArrayList<Categories> getCategoriesFromJson(String json) {
        try {

            JSONArray CategoriesArr = new JSONArray(json);
            ArrayList<Categories> listToReturn = new ArrayList<Categories>();

            for (int i = 0; i < CategoriesArr.length(); i++) {
                JSONObject cocktailObj = CategoriesArr.getJSONObject(i);

                int categoryId = cocktailObj.getInt("id");
                String categoryName = cocktailObj.getString("name");
                listToReturn.add(new Categories(categoryId, categoryName));
                ;
            }
            return listToReturn;

        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }

}
