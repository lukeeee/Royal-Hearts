package matkasseWS;

import java.io.UnsupportedEncodingException;
import java.security.NoSuchAlgorithmException;
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
@Path("/user")
public class UserResource {
	
	@Path("/login/{username}/{password}")
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public User doLoginUser(@PathParam("username") String username, @PathParam("password") String pwd) throws NoSuchAlgorithmException, UnsupportedEncodingException{
		User user = DB_CONN.Login(username, pwd);
		return user;
		
	}

}
