package matkasseWS;

import java.util.ArrayList;

public class Foodbasket {
	public int user_ID;
	public ArrayList<BasketItem> items;
	
	public Foodbasket(int userID){
		
		this.user_ID = userID;
		this.items = new ArrayList<BasketItem>();
	}
}
