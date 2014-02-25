package se.group1.royalhearts;

import android.content.Context;
import android.media.MediaPlayer;
import android.util.Log;

/**
 * Created by Lukas on 2014-02-24.
 */
public class SoundManager {


    public static void start(int source, Context context){
       if (User.getSound() == true){
            try{
                MediaPlayer mp = MediaPlayer.create(context, source);
                mp.start();
            } catch (Exception e){
                Log.i("MPerror", "" + e);
            }
        }
    }
}