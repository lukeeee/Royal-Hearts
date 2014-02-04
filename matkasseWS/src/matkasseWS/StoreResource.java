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
@Path("/store")
public class StoreResource {
	
	@Path("/getall")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public ArrayList<Store> doGetJSONStores(){
		ArrayList<Store> stores = new ArrayList<Store>();
		stores = DB_CONN.getStores();
		
		return stores;
	}
	
	@Path("/getbycity/{city_id}")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public ArrayList<Store> doGetCityStores(@PathParam("city_id") int cityID){
		ArrayList<Store> stores = new ArrayList<Store>();
		stores = DB_CONN.getStoresByCity(cityID);
		
		return stores;
	}
	
	@Path("/update/{store_id}/{name}")
	@GET
	@Produces(MediaType.TEXT_PLAIN)
	public String doUpdateStore(@PathParam("store_id") int storeID, @PathParam("name") String name){
		int success = DB_CONN.updateStore(storeID, name);
		String ret = Integer.toString(success);
		
		return ret;
	}
	

}
