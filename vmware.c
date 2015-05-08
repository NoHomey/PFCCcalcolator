#include <stdio.h>
#include <curl/curl.h>
#include <string.h>
#include <stdlib.h>
#include <stdbool.h>
struct MemoryStruct {
  char *memory;
  size_t size;
};
 
inline void p_cpy(char* dst, char* src, size_t len) {
  size_t i;
  for (i=0; i<len; i++) dst[i] = src[i];
}

inline void my_cpy(char* dst, char* src) {
  dst[0] = src[0];
  dst[1] = src[1];
  dst[2] = src[2];
  dst[3] = src[3];
}

inline size_t str_cpy(char* dst, char* src) {
  size_t i = 0;
  while( (src[i] >= '0') && (src[i] <= '9') ) {
    dst[i] = src[i];
    i++;
    if(i==4) break;
  }
  return i;
}

inline size_t WriteMemoryCallback(void *contents, size_t size, size_t nmemb, void *userp) {
  size_t realsize = size * nmemb;
  struct MemoryStruct *mem = (struct MemoryStruct *)userp;
  mem->memory = realloc(mem->memory, mem->size + realsize + 1);
  if(mem->memory == NULL) {
    return 0;
  }
  p_cpy(&(mem->memory[mem->size]), contents, realsize);
  mem->size += realsize;
  mem->memory[mem->size] = 0;
  return realsize;
}

inline bool equal(char* ptr1, char* ptr2) {
  return ((ptr1[0] == ptr2[0]) && (ptr1[1] == ptr2[1]) && (ptr1[2] == ptr2[2]) && (ptr1[3] == ptr2[3]));
}

inline bool not_in(char* search, char** where, size_t len) {
  size_t i;
  for(i = 0; i < len; i++) {
    if(equal(search, where[i]) == false) return true;
  }
  if(i == 0) return true;
  else return false;
}

inline size_t init (char* tar, char* chil, char* per) {
  tar[0] = 't';
  tar[1] = 'r';
  tar[2] = 'a';
  tar[3] = 'j';
  tar[4] = 'e';
  tar[5] = 'c';
  tar[6] = 't';
  tar[7] = 'o';
  tar[8] = 'r';
  tar[9] = 'y';
  tar[10] = '=';
  size_t pos = str_cpy(tar + 11, chil);
  pos += 11;
  tar[pos++] = ' ';
  return pos + str_cpy(tar + pos, per);
}

inline size_t inc_traject(char* tar, char* node, size_t pos) {
  tar[pos++] = ' ';
  return pos + str_cpy(tar + pos, node);
}

int main(void) {
  CURL *curl_handle;
  CURLcode result;
  struct MemoryStruct get_es;
  get_es.memory = malloc(1);  
  get_es.size = 0;  
  curl_global_init(CURL_GLOBAL_ALL);
  curl_handle = curl_easy_init();
  curl_easy_setopt(curl_handle, CURLOPT_URL, "http://83.143.146.64:8080/api/sector/9/objects");
  curl_easy_setopt(curl_handle, CURLOPT_WRITEFUNCTION, WriteMemoryCallback);
  curl_easy_setopt(curl_handle, CURLOPT_WRITEDATA, (void *)&get_es);
  curl_easy_setopt(curl_handle, CURLOPT_USERAGENT, "libcurl-agent/1.0");
  result = curl_easy_perform(curl_handle);
  struct MemoryStruct get_rs; 
  get_rs.memory = malloc(1);  
  get_rs.size = 0; 
  curl_easy_setopt(curl_handle, CURLOPT_URL, "http://83.143.146.64:8080/api/sector/9/roots");
  curl_easy_setopt(curl_handle, CURLOPT_WRITEDATA, (void *)&get_rs);
  result = curl_easy_perform(curl_handle);
  int i;
  int k = 0;
  int l = 0;
  int flag;
  int rs_len = 0;
  int es_len = 0;
  int fs_len = 0;
  int ce_len = 0;
  int ns_len = 0;
  int ts_len = 0;
  int founds[2000];
  int lens[2000];
  char* perent = calloc(1, 4);
  char* traject = calloc(1500, 4);
  char** roots = calloc(1000, 4);
  char** cycle = calloc(1000, 4);
  char** nodes = calloc(1000, 4);
  char*** edges = calloc(2000, 4);
  char** trajecs = calloc(800, 4);
  for(i = 0;i<1000;i++) {
    roots[i] = calloc(4, 4);
    cycle[i] = calloc(4, 4);
    nodes[i] = calloc(4, 4);
   }
   for(i = 0;i<2000;i++) {
     edges[i] = calloc(2, 4);
     edges[i][0] = calloc(4, 4); 
     edges[i][1] = calloc(4, 4);
   }
   for(i = 0;i<800;i++) trajecs[i] = calloc(1500, 4); 
   i = k = 0;
  while(i < get_rs.size - 1) {
   if(get_rs.memory[i] == '\n') {
      k = 0;
      rs_len++;
   } else {
     roots[rs_len][k] = get_rs.memory[i];
     k++;
   } 
    i++;  
  }
  i = k = l = 0;
  while(i < get_es.size - 1) {
   if(get_es.memory[i] == '\n') {
      k = l = 0;
      es_len++;
   } else {
     if(get_es.memory[i] == ' ') {
       k = 1;
       l = 0;
     } else {
       edges[es_len][k][l] = get_es.memory[i];
       l++;
     }
   } 
    i++;  
  }
  rs_len++;
  es_len++;
  /*for(i = 0;i<es_len;i++) printf("s%d: %s %s\n",i, edges[i][0], edges[i][1]);
  sleep(10);
  for(i = 0;i<rs_len;i++) printf("r%d: %s\n",i, roots[i]);
     sleep(10);*/
  memcpy(cycle,roots, rs_len);
  ce_len = rs_len;
  fs_len = 1;
  while(fs_len > 0) {
    fs_len = 0;
    for(i = 0; i < es_len;i++) {
      for(k = 0; k < ce_len;k++) {
        if(equal(edges[i][0], cycle[k])) {
          founds[fs_len++] = i;
          break;
        }
      }
    }
    ce_len = 0;
    for(i=0; i < fs_len;i++) {
       my_cpy(cycle[ce_len], edges[founds[i]][1]);
       ce_len++;
       if (not_in(edges[founds[i]][1], roots, rs_len)) {
         my_cpy(roots[rs_len], edges[founds[i]][1]);
         rs_len++;
       }
       edges[founds[i]][0][0] = edges[founds[i]][1][0] = '\0';
    }
  }
  //for(i = 0;i<rs_len;i++) printf("r%d: %s\n",i, roots[i]);
//Purviqt etap RDY!
  for(i = 0;i<es_len;i++) {
    for(k = 0; k < rs_len; k++) {
       if(equal(edges[i][1], roots[k])) {
          if(not_in(edges[i][0], nodes, ns_len)) {
            my_cpy(nodes[ns_len], edges[i][0]);
            ns_len++;
            founds[fs_len++] = i;
            break;  
          }
       }   
    }
  }
  for(i = 0;i < fs_len;i++) edges[founds[i]][0][0] = edges[founds[i]][1][0] = '\0';
  ce_len = 0;
  while(1) {
    flag = 0;
    for(i = 0;i < es_len;i++) {
       if((!equal(edges[i][0], edges[i][1])) && (not_in(edges[i][0], cycle, ce_len)) && (not_in(edges[i][1], cycle, ce_len)) && (edges[i][0][0] != '\0')) {
         my_cpy(perent, edges[i][1]);
         l = init(traject, edges[i][0], perent);
         my_cpy(cycle[ce_len], edges[i][0]);
         ce_len++;
         my_cpy(cycle[ce_len], perent);
         ce_len++;
         fs_len = 0;
         founds[fs_len++] = i;
         flag = 1;
         break;
       }
    }
    if(!flag) break;
    while(1) {
      flag = 0;
      for(i = 0;i < es_len;i++) {
        if((equal(perent,edges[i][0])) && (!equal(edges[i][0],edges[i][1])) && (not_in(edges[i][1], cycle, ce_len))) {
          my_cpy(perent, edges[i][1]);
          k = inc_traject(traject, perent, l);
          l = k;
          my_cpy(cycle[ce_len], perent);
          ce_len++;
          founds[fs_len++] = i;
          flag = 1;
          break;
        }
      }
    if(!flag) break;
    }
    printf("\n %d %s\n",ts_len, traject);
    printf("\n %d %d\n", l, strlen(traject));
    sleep(1);
    p_cpy(trajecs[ts_len], traject, l);
    free(traject);
    char* traject = calloc(1500, 4); 
    lens[ts_len++] = l;
    for(i = 0;i < fs_len;i++) edges[founds[i]][0][0] = edges[founds[i]][1][0] = '\0';
    }



  //for(i = 0;i<es_len;i++) printf("s%d: %s %s\n",i, edges[i][0], edges[i][1]);
  curl_easy_cleanup(curl_handle);
  curl_global_cleanup();
  //free(get_rs.memory);
  return 0;
}