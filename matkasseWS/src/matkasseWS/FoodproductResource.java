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
import javax.ws.rs.core.Response;
//The class registers its methods for the HTTP GET request using the @GET annotation. 
//Using the @Produces annotation, it defines that it can deliver several MIME types,
//text, XML and HTML. 

//The browser requests per default the HTML MIME type.

//Sets the path to base URL + classname
@Path("/foodproduct")
public class FoodproductResource {
	
	@Path("/getall")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public ArrayList<Foodproduct> doGetTEXTFoodProducts(){
		ArrayList<Foodproduct> fps = new ArrayList<Foodproduct>();
		
		fps = DB_CONN.getFoodproducts();
		
		return fps;
	}
	
	@Path("/getbysupplier/{userID}")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public ArrayList<Foodproduct> doGetJSONFoodProductsBySupp(@PathParam("userID") int user_ID){
		ArrayList<Foodproduct> fps = new ArrayList<Foodproduct>();
		
		fps = DB_CONN.getFoodproductsBySupplier(user_ID);
		
		return fps;
	}
	
	
	@Path("/{foodproductID}")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public Foodproduct doGetFoodproduct(@PathParam("foodproductID") String fp_id){
		DB_CONN db = new DB_CONN();
		Foodproduct fp = new Foodproduct();
		fp = db.getFoodproduct(Integer.parseInt(fp_id));
		return fp;
	}
	
	@Path("/getbycat/{catID}")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public ArrayList<Foodproduct> doGetFoodproductByID(@PathParam("catID") int cat_ID){
		ArrayList<Foodproduct> fps = new ArrayList<Foodproduct>();
		DB_CONN db = new DB_CONN();
		fps = db.getFoodproductsByCat(cat_ID);
		return fps;
	}
	
	@Path("/update/{itemID}/{itemName}/{catID}")
	@GET
	@Produces(MediaType.TEXT_PLAIN)
	public String doUpdateFoodProduct(@PathParam("itemID") int itemID, @PathParam("itemName") String itemName, @PathParam("catID") int catID){
		int success = DB_CONN.updateFoodProduct(itemID, itemName, catID);
		String ret = Integer.toString(success);
		
		return ret;
	}
	
	@Path("/add/{itemName}/{catID}/{suppID}")
	@GET
	@Produces(MediaType.TEXT_PLAIN)
	public String doAddFoodProduct(@PathParam("itemName") String itemName, @PathParam("catID") int catID, @PathParam("suppID") int suppID){
		int success = DB_CONN.addFoodProduct(itemName, catID, suppID);
		String ret = Integer.toString(success);
		
		return ret;
		
	}
	
	@Path("/remove/{itemID}")
	@GET
	@Produces(MediaType.TEXT_PLAIN)
	public String doDeleteProduct(@PathParam("itemID") int itemID){
		int success = DB_CONN.removeFoodProduct(itemID);
		String ret = Integer.toString(success);
		
		return ret;
	}

}
