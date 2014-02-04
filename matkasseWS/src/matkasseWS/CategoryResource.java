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

// The class registers its methods for the HTTP GET request using the @GET annotation. 
// Using the @Produces annotation, it defines that it can deliver several MIME types,
// text, XML and HTML. 

// The browser requests per default the HTML MIME type.

//Sets the path to base URL + classname
@Path("/category")
public class CategoryResource {
	
	ArrayList<Category> cats = new ArrayList<Category>();
	
	@Path("/getall")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public ArrayList<Category> doGetJSONCategories(){
		//ArrayList<Category> cats = new ArrayList<Category>();
		DB_CONN db = new DB_CONN();
		cats = db.getCategories();
		
		
		
		return cats;
	}
	
	@Path("/{category_ID}")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public Category doGetCategoryName(@PathParam("category_ID") int cat_id){
		Category cat = new Category();
		if(cats.size() <= 0){
		DB_CONN db = new DB_CONN();
		
		cat = db.getCategory(cat_id);
		}else{
			for(int i = 0; i <cats.size();i++){
				if(cats.get(i).id == cat_id){
					cat = cats.get(i);
				}
			}
		}
		return cat;
	}
	
	@Path("/remove/{cat_id}")
	@GET
	@Produces(MediaType.TEXT_PLAIN)
	public String doDeleteCategory(@PathParam("cat_id") int cat_id){
		int success = DB_CONN.removeCategory(cat_id);
		String ret = Integer.toString(success);
		
		return ret;
	}
	
	@Path("/add/{cat_name}")
	@GET
	@Produces(MediaType.TEXT_PLAIN)
	public String doAddCategory(@PathParam("cat_name") String catName){
		int success = DB_CONN.addCategory(catName);
		String ret = Integer.toString(success);
		
		return ret;
	}
	
	@Path("/update/{cat_id}/{cat_name}")
	@GET
	@Produces
	public String doUpdateCategory(@PathParam("cat_id") int catID, @PathParam("cat_name") String catName){
		int success = DB_CONN.updateCategory(catID, catName);
		String ret = Integer.toString(success);
		
		return ret;
	}
	

}
