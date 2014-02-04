package matkasseWS;

import java.io.UnsupportedEncodingException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

import com.mysql.jdbc.PreparedStatement;



public class DB_CONN {
	
	//124020-matkasse
	//124020-wj64012
	//matkasse1
	private static String globalsalt = "gasd5yg7td7asg332ea9";
	public static String url = "jdbc:mysql://mysql06.citynetwork.se:3306/124020-matkasse";
	public static String user = "124020-wj64012";
	public static String password = "matkasse1";

	public static String current_user = "";

	Connection connection = null;
	public static String driverName = "com.mysql.jdbc.Driver"; // for MySql
	
	
	
	public static Category getCategory(int id) {
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;

		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.createStatement();
			rs = st.executeQuery("SELECT * FROM categories WHERE id=" + id);

			if (rs.next()) {
				Category cat = new Category();
				cat.name = rs.getString("name");
				cat.id = rs.getInt("id");

				return cat;
			}
			st.close();
			con.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return null;
	}
	
	
	
	public static ArrayList<Category> getCategories(){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		ArrayList<Category> ret = new ArrayList<Category>();
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.createStatement();
			rs = st.executeQuery("SELECT * FROM categories");

			while (rs.next()) {
				Category cat = new Category();
				cat.name = rs.getString("name");
				cat.id = rs.getInt("id");

				ret.add(cat);
			}
			st.close();
			con.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return ret;
		
	}
	
	public static Foodproduct getFoodproduct(int id){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;

		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.createStatement();
			rs = st.executeQuery("SELECT * FROM foodproducts WHERE id=" + id);

			if (rs.next()) {
				Foodproduct fp = new Foodproduct();
				fp.name = rs.getString("name");
				fp.id = rs.getInt("id");
				fp.categoryID = rs.getInt("categoryID");

				return fp;
			}
			st.close();
			con.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return null;
	}
	
	public static ArrayList<Foodproduct> getFoodproducts(){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		ArrayList<Foodproduct> ret = new ArrayList<Foodproduct>();
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.createStatement();
			rs = st.executeQuery("SELECT categories.name AS cat_name, foodproducts.* FROM foodproducts JOIN categories ON foodproducts.categoryID = categories.id");

			while (rs.next()) {
				Foodproduct fp = new Foodproduct();
				fp.name = rs.getString("name");
				fp.id = rs.getInt("id");
				fp.categoryID = rs.getInt("categoryID");
				fp.cat_name = rs.getString("cat_name");

				ret.add(fp);
			}
			st.close();
			con.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return ret;
		
	}
	
	public static ArrayList<Foodproduct> getFoodproductsByCat(int cat_id){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		ArrayList<Foodproduct> ret = new ArrayList<Foodproduct>();
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.createStatement();
			rs = st.executeQuery("SELECT * FROM foodproducts WHERE categoryID = "+cat_id);

			while (rs.next()) {
				Foodproduct fp = new Foodproduct();
				fp.name = rs.getString("name");
				fp.id = rs.getInt("id");
				fp.categoryID = rs.getInt("categoryID");

				ret.add(fp);
			}
			st.close();
			con.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return ret;
		
	}
	
	public static Foodbasket getFoodbasket(int userid){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		Foodbasket ret = new Foodbasket(0);
		
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.createStatement();
			rs = st.executeQuery("SELECT * FROM foodbasket_order JOIN foodproducts ON foodbasket_order.foodproduct_ID = foodproducts.id WHERE foodbasket_order.userID = "+userid);
			
			Foodbasket fb = new Foodbasket(userid);
				
				while (rs.next()) {
					
					System.out.println("test2"+rs.getString("name"));					BasketItem bi = new BasketItem();
					bi.name = rs.getString("name");
					bi.id = rs.getInt("foodproduct_ID");
					bi.category_ID = rs.getInt("categoryID");
					bi.quantity = rs.getInt("quantity");
					fb.items.add(bi);	
					
				}
				
				ret = fb;
			
			st.close();
			con.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return ret;
	}
	
	public static ArrayList<Store> getStores(){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		ArrayList<Store> ret = new ArrayList<Store>();
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.createStatement();
			rs = st.executeQuery("SELECT * FROM stores");

			while (rs.next()) {
				Store store = new Store();
				store.name = rs.getString("name");
				store.id = rs.getInt("id");
				

				ret.add(store);
			}
			st.close();
			con.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return ret;
	}
	
	public static ArrayList<Store> getStoresByCity(int cityID){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		ArrayList<Store> ret = new ArrayList<Store>();
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.createStatement();
			rs = st.executeQuery("SELECT stores.name AS storeName, stores.managerID, cities.name AS cityName, city_store.* FROM `city_store` JOIN stores ON stores.id = city_store.storeID JOIN cities ON city_store.cityID = cities.id WHERE city_store.cityID = "+cityID);

			while (rs.next()) {
				Store store = new Store();
				store.name = rs.getString("storeName");
				store.id = rs.getInt("storeID");
				store.cityID = rs.getInt("cityID");
				store.cityName = rs.getString("cityName");
				store.managerID = rs.getInt("managerID");

				ret.add(store);
			}
			st.close();
			con.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return ret;
		
	}
	
	public static ArrayList<City> getCities(){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		ArrayList<City> ret = new ArrayList<City>();
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.createStatement();
			rs = st.executeQuery("SELECT * FROM cities");

			while (rs.next()) {
				City city = new City();
				city.name = rs.getString("name");
				city.id = rs.getInt("id");
				
				ret.add(city);
			}
			st.close();
			con.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return ret;
	}
	
	//***ADD FUNCTIONS****//
	public static Integer addItemBasket(int userID_send, int itemID_send, int quantity_send){
		Connection con = null;
		java.sql.PreparedStatement st = null;
		ResultSet rs = null;
		Integer ret;
		
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.prepareStatement("INSERT INTO foodbasket_order (userID, quantity, foodproduct_ID) VALUES ('?','?','?')");
			st.setInt(2, userID_send);
			st.setInt(3, quantity_send);
			st.setInt(4, itemID_send);

			int affectedRows = st.executeUpdate();
			if (affectedRows == 0) {
				throw new SQLException("Ett fel uppstod när varan skulle läggas till");
			} else {
				return 1;
			}
			
			
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return 0;
	}
	
	public static User Login(String username, String pwd) throws NoSuchAlgorithmException, UnsupportedEncodingException{
		
		
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		User ret = new User();
		
		
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.createStatement();
			rs = st.executeQuery("SELECT * FROM users WHERE username ='"+username+"'");
			User logged_user = new User();
			logged_user.id = -1;
			if (rs.next()) {
				String db_salt = rs.getString("salt");
				int userid = rs.getInt("id");
				String db_pwd = rs.getString("password");
				String pwd_user = SHA256(pwd+db_salt+globalsalt);
				int privilege = rs.getInt("privilege");
				System.out.println("pwd1: "+db_pwd);
				System.out.println("pwd2: "+pwd_user);
				if(pwd_user.equals(db_pwd)){
					
					
					logged_user.id = userid;
					logged_user.privilege = privilege;
					logged_user.username = username;
					System.out.println("userlogged"+logged_user.toString());
					
				}
				
				
				
			}
			ret = logged_user;
			st.close();
			con.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}
		
		return ret;
	}
	
	
	//***REMOVE FUNCTIONS***//
	public static Integer removeItemBasket(int userID_send, int itemID_send, int quantity_send){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		try {
			con = DriverManager.getConnection(url, user, password);
			st = con.createStatement();
			st.executeUpdate("DELETE FROM foodbasket_order WHERE userID=" + userID_send +" AND foodproduct_ID ="+itemID_send);

			
			return 1;

		} catch (SQLException e) {
			e.printStackTrace();
		}

		return 0;
	}
	
	public static Integer removeFoodBasket(int userID_send){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		try {
			con = DriverManager.getConnection(url, user, password);
			st = con.createStatement();
			st.executeUpdate("DELETE FROM foodbasket_order WHERE userID=" + userID_send);

			
			return 1;

		} catch (SQLException e) {
			e.printStackTrace();
		}

		return 0;
	}
	
	
	///***ADMIN FUNCTIONS***///
	
	public static Integer addCategory(String cat_name){
		Connection con = null;
		java.sql.PreparedStatement st = null;
		ResultSet rs = null;
		
		
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);
			String SQL_INSERT = "INSERT INTO categories (name) VALUES (?)";
			st = (PreparedStatement) con.prepareStatement(SQL_INSERT);
			st.setString(1, cat_name);

			int affectedRows = st.executeUpdate();
			if (affectedRows == 0) {
				throw new SQLException("Ett fel uppstod när kategorin skulle läggas till");
			} else {
				return 1;
			}
			
			
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return 0;
	}
	
	public static Integer updateCategory(int cat_id, String cat_name){
		Connection con = null;
		java.sql.PreparedStatement st = null;
		ResultSet rs = null;
		Integer ret;
		
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.prepareStatement("UPDATE categories SET name = '"+cat_name+"' WHERE id = "+cat_id);
			st.setString(1, cat_name);

			int affectedRows = st.executeUpdate();
			if (affectedRows == 0) {
				throw new SQLException("Ett fel uppstod när kategorin skulle läggas till");
			} else {
				return 1;
			}
			
			
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return 0;
	}
	
	public static Integer removeCategory(int cat_id){
		Connection con = null;
		Statement st = null;
		ResultSet rs = null;
		try {
			con = DriverManager.getConnection(url, user, password);
			st = con.createStatement();
			st.executeUpdate("DELETE FROM categories WHERE id=" + cat_id);

			
			return 1;

		} catch (SQLException e) {
			e.printStackTrace();
		}

		return 0;
	}
	
	public static Integer updateStore(int storeID, String name){
		Connection con = null;
		java.sql.PreparedStatement st = null;
		ResultSet rs = null;
		Integer ret;
		
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.prepareStatement("UPDATE categories SET name = '"+name+"' WHERE id = "+storeID);
			st.setString(1, name);

			int affectedRows = st.executeUpdate();
			if (affectedRows == 0) {
				throw new SQLException("Ett fel uppstod när affären skulle uppdateras");
			} else {
				return 1;
			}
			
			
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return 0;
		
	}
	
	public static int updateFoodProduct(int itemID, String itemName, int cat_id){
		Connection con = null;
		java.sql.PreparedStatement st = null;
		ResultSet rs = null;
		Integer ret;
		
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.prepareStatement("UPDATE foodproducts SET name = ?, categoryID = ? WHERE id = "+itemID);
			st.setString(1, itemName);
			st.setInt(2, cat_id);

			int affectedRows = st.executeUpdate();
			if (affectedRows == 0) {
				throw new SQLException("Ett fel uppstod när affären skulle uppdateras");
			} else {
				return 1;
			}
			
			
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return 0;
		
	}
	
	public static int addFoodProduct(String itemName, int catID){
		Connection con = null;
		java.sql.PreparedStatement st = null;
		ResultSet rs = null;
		Integer ret;
		
		try {
			try {
				Class.forName(driverName);
			} catch (ClassNotFoundException e) {
				System.out
						.println("ClassNotFoundException : " + e.getMessage());
			}
			con = DriverManager.getConnection(url, user, password);

			st = con.prepareStatement("INSERT INTO foodproducts (name, categoryID) VALUES(?, ?)");
			st.setString(1, itemName);
			st.setInt(2, catID);

			int affectedRows = st.executeUpdate();
			if (affectedRows == 0) {
				throw new SQLException("Ett fel uppstod när affären skulle uppdateras");
			} else {
				return 1;
			}
			
			
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return 0;
	}
	
	/**
     * Hash functions used to hash username and password.
     */
    private static String convertToHex(byte[] data) {
        StringBuilder buf = new StringBuilder();
        for (byte b : data) {
            int halfbyte = (b >>> 4) & 0x0F;
            int two_halfs = 0;
            do {
                buf.append((0 <= halfbyte) && (halfbyte <= 9) ? (char) ('0' + halfbyte) : (char) ('a' + (halfbyte - 10)));
                halfbyte = b & 0x0F;
            } while (two_halfs++ < 1);
        }
        return buf.toString();
    }
	
    private static String SHA256(String text) throws NoSuchAlgorithmException, UnsupportedEncodingException {
        MessageDigest md = MessageDigest.getInstance("SHA-256");
        md.update(text.getBytes("UTF-8"), 0, text.length());
        byte[] sha256hash = md.digest();
        return convertToHex(sha256hash);
    }
}
