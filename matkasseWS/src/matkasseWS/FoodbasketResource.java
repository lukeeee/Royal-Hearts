package matkasseWS;

import java.util.ArrayList;

import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
// Plain old Java Object it does not extend as class or implements 
// an interface

//The class registers its methods for the HTTP GET request using the @GET annotation. 
//Using the @Produces annotation, it defines that it can deliver several MIME types,
//text, XML and HTML. 

//The browser requests per default the HTML MIME type.

//Sets the path to base URL + classname
@Path("/foodbasket")
public class FoodbasketResource {
	
	@Path("/{user_ID}")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public Foodbasket doGetJSONFoodBasket(@PathParam("user_ID") int user_ID){
		Foodbasket result = DB_CONN.getFoodbasket(user_ID);
		
		return result;
	}
	

	@Path("/additem/{user_id}/{item_id}/{quantity}")
	@GET
	@Produces(MediaType.TEXT_PLAIN)
	public String doAddItem(@PathParam("user_id") int userID, @PathParam("item_id") int itemID, @PathParam("quantity") int quantity){
		Integer success = DB_CONN.addItemBasket(userID, itemID, quantity);
		String ret = Integer.toString(success);
		
		return ret;
	}
	
	@Path("/removeitem/{user_ID}/{item_ID}/{quantity}")
	@GET
	@Produces(MediaType.TEXT_PLAIN)
	public String doRemoveItem(@PathParam("user_id") int userID, @PathParam("item_id") int itemID, @PathParam("quantity") int quantity){
		Integer success = DB_CONN.removeItemBasket(userID, itemID, quantity);
		String ret = Integer.toString(success);
		
		return ret;
	}
	
	@Path("/delete/{userid}")
	@GET
	@Produces(MediaType.TEXT_PLAIN)
	public String doDeleteFoodBasket(@PathParam("userid") int userID){
		int success = DB_CONN.removeFoodBasket(userID);
		String ret = Integer.toString(success);
		
		return ret;
	}
}
