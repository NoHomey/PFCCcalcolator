#include <stdio.h>
#include <curl/curl.h>
#include <string.h>
#include <stdlib.h>
#include <stdbool.h>
struct MemoryStruct {
  char *memory;
  size_t size;
};
 
inline void my_cpy(char* dst, char* src) {
  dst[0] = src[0];
  dst[1] = src[1];
  dst[2] = src[2];
  dst[3] = src[3];
}

inline size_t WriteMemoryCallback(void *contents, size_t size, size_t nmemb, void *userp) {
  size_t realsize = size * nmemb;
  struct MemoryStruct *mem = (struct MemoryStruct *)userp;
  mem->memory = malloc(realsize);
  if(mem->memory == NULL) {
    return 0;
  }
  memcpy(&(mem->memory[mem->size]), contents, realsize);
  mem->size = realsize - 1;
  return realsize;
}

inline bool compare(char* ptr1, char* ptr2) {
  return ((ptr1[0] == ptr2[0]) && (ptr1[1] == ptr2[1]) && (ptr1[2] == ptr2[2]) && (ptr1[3] == ptr2[3]));
}

int main(void) {
  CURL *curl_handle;
  CURLcode result;
  struct MemoryStruct get_es;   
  curl_global_init(CURL_GLOBAL_ALL);
  curl_handle = curl_easy_init();
  curl_easy_setopt(curl_handle, CURLOPT_URL, "http://83.143.146.64:8080/api/sector/9/objects");
  curl_easy_setopt(curl_handle, CURLOPT_WRITEFUNCTION, WriteMemoryCallback);
  curl_easy_setopt(curl_handle, CURLOPT_WRITEDATA, (void *)&get_es);
  curl_easy_setopt(curl_handle, CURLOPT_USERAGENT, "libcurl-agent/1.0");
  result = curl_easy_perform(curl_handle);
  struct MemoryStruct get_rs;   
  curl_easy_setopt(curl_handle, CURLOPT_URL, "http://83.143.146.64:8080/api/sector/9/roots");
  curl_easy_setopt(curl_handle, CURLOPT_WRITEDATA, (void *)&get_rs);
  result = curl_easy_perform(curl_handle);
  int founds[2000];
  int i;
  int k = 0;
  int l = 0;
  int flag = 1;
  int rs_len = 0;
  int es_len = 0;
  int fs_len = 0;
  int ce_len = 0;
  int ns_len = 0;
  bool cmp_res;
  char* perent = calloc(4, 4);
  char** roots = calloc(1000, 4);
  char** cycle = calloc(1000, 4);
  char** nodes = calloc(1000, 4);
  char*** edges = calloc(2000, 4);
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
  i = k = 0;
  while(i < get_rs.size) {
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
  while(i < get_es.size) {
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
  //for(i = 0;i<es_len;i++) printf("s%d: %s %s\n",i, edges[i][0], edges[i][1]);
  //for(i = 0;i<rs_len;i++) printf("r%d: %s\n",i, roots[i]);
// PARSING RESPONSES AND GETING ROOTS AND edges AS ARRAYS!!!!!!!!!!!!!!!
  memcpy(cycle,roots, rs_len);
  ce_len = rs_len;
  fs_len = 1;
  while(fs_len > 0) {
    fs_len = 0;
    for(i = 0; i < es_len;i++) {
      for(k = 0; k < ce_len;k++) {
        if(compare(edges[i][0], cycle[k])) {
          founds[fs_len++] = i;
          break;
        }
      }
    }
    ce_len = 0;
    for(i=0; i < fs_len;i++) {
       my_cpy(cycle[ce_len], edges[founds[i]][1]);
       ce_len++;
       for(l = 0; l < rs_len;l++) cmp_res = compare(roots[l], edges[founds[i]][1]);
       if (!cmp_res) {
         my_cpy(roots[rs_len], edges[founds[i]][1]);
         rs_len++;
       }
       edges[founds[i]][0][0] = edges[founds[i]][1][0] = '\0';
    }
  }
  //for(i = 0;i<rs_len;i++) printf("r%d: %s\n",i, roots[i]);
// Purviqt etap RDY!
  for(i = 0;i<es_len;i++) {
    for(k = 0; k < rs_len; k++) {
       if(compare(edges[i][1], roots[k])) {
          cmp_res = 0;
          for(l =0; l < ns_len;l++) cmp_res = compare(edges[i][0], nodes[l]);
          if(!cmp_res) {
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
  while(flag) {
    flag = 0;
    for(i = 0;i < es_len;i++) {
      


    }
 


  }



  for(i = 0;i<es_len;i++) printf("s%d: %s %s\n",i, edges[i][0], edges[i][1]);
  curl_easy_cleanup(curl_handle);
  curl_global_cleanup();
  free(get_rs.memory);
  return 0;
}