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
@Path("/city")
public class CityResource {
	
	@Path("/getall")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public ArrayList<City> doGetJSONCities(){
		ArrayList<City> cities = new ArrayList<City>();
		cities = DB_CONN.getCities();
		
		return cities;
	}

}
