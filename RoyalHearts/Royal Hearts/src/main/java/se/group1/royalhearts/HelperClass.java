package se.group1.royalhearts;


import android.util.Log;


public class HelperClass {
    public static class User{

        // This class stores all needed user data. Name, Email, Identifier and ID.

        public static String userName;
        public static String userEmail;
        public static String userIdentifier;
        public static int userId;


        // This will set all values on login
        public static void setValues(String result){

            try{

                // set userName
                int indexName = result.indexOf("|username:");
                userName = (result.substring(indexName, result.length()));
                userName = userName.replace("|username:", "");

                // set userIdentifier
                int indexIdentifier = result.indexOf("identifier");
                userIdentifier = (result.substring(indexIdentifier, result.length()));
                int delimiterIndex = userIdentifier.indexOf("|");
                userIdentifier = (userIdentifier.substring(0, delimiterIndex));
                userIdentifier = userIdentifier.replace("identifier:", "");

                // set userId
                String tempIdString = result.replace("Logged in successfully!|", "");
                int indexId = tempIdString.indexOf("|");
                tempIdString = (tempIdString.substring(0, indexId));
                tempIdString = tempIdString.replace("userId:", "");
                userId = Integer.parseInt(tempIdString);
            } catch(NumberFormatException nEx) {
                Log.e("BottomApp", "Exception: " + nEx.getMessage());
            } catch(IndexOutOfBoundsException iEx){
                Log.e("BottomApp", "Exception: " + iEx.getMessage());
            }

        }

    }



}
