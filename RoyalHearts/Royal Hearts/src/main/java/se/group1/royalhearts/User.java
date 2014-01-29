package se.group1.royalhearts;

/**
 * Created by Lukas on 2014-01-28.
 */

public class User {
     private int id;
     private String username;
     private String password;
     private String privilege;

        public int getId() {
            return id;
        }


        public void setId(int id) {
            this.id = id;
        }


        public String getUsername() {
            return username;
        }


        public void setUsername(String username) {
            this.username = username;
        }


        public String getPassword() {
            return password;
        }


        public void setPassword(String password) {
            this.password = password;
        }

        public String getPrivilege() {
            return privilege;
        }

        public void setPrivilege(String privilege) {
            this.privilege = privilege;
        }

    }

