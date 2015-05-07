#include <stdio.h>
#include <curl/curl.h>
#include <string.h>
#include <stdlib.h>
#include <stdbool.h>
struct MemoryStruct {
  char *memory;
  size_t size;
};
 
inline char* my_cpy(char* dst, char* src, size_t len) {
  size_t i;
  for (i=0; i<len; i++) dst[i] = src[i];
  return dst;
}

inline size_t WriteMemoryCallback(void *contents, size_t size, size_t nmemb, void *userp) {
  size_t realsize = size * nmemb;
  struct MemoryStruct *mem = (struct MemoryStruct *)userp;
  mem->memory = realloc(mem->memory, mem->size + realsize + 1);
  if(mem->memory == NULL) {
    return 0;
  }
  my_cpy(&(mem->memory[mem->size]), contents, realsize);
  mem->size += realsize;
  mem->memory[mem->size] = 0;
  return realsize;
}

inline bool compare(char* ptr1, char* ptr2) {
  return ((ptr1[0] == ptr2[0]) && (ptr1[1] == ptr2[1]) && (ptr1[2] == ptr2[2]) && (ptr1[3] == ptr2[3]));
}

int main(void) {
  CURL *curl_handle;
  CURLcode result;
  struct MemoryStruct get_es;
  get_es.memory = malloc(1);  
  get_es.size = 0;    
  curl_global_init(CURL_GLOBAL_ALL);
  curl_handle = curl_easy_init();
  curl_easy_setopt(curl_handle, CURLOPT_URL, "http://83.143.146.64:8080/api/sector/1/objects");
  curl_easy_setopt(curl_handle, CURLOPT_WRITEFUNCTION, WriteMemoryCallback);
  curl_easy_setopt(curl_handle, CURLOPT_WRITEDATA, (void *)&get_es);
  curl_easy_setopt(curl_handle, CURLOPT_USERAGENT, "libcurl-agent/1.0");
  result = curl_easy_perform(curl_handle);
  if(result != CURLE_OK) {
    return 0;
  }
  struct MemoryStruct get_rs;
  get_rs.memory = malloc(1);  
  get_rs.size = 0;    
  curl_global_init(CURL_GLOBAL_ALL);
  curl_handle = curl_easy_init();
  curl_easy_setopt(curl_handle, CURLOPT_URL, "http://83.143.146.64:8080/api/sector/1/roots");
  curl_easy_setopt(curl_handle, CURLOPT_WRITEFUNCTION, WriteMemoryCallback);
  curl_easy_setopt(curl_handle, CURLOPT_WRITEDATA, (void *)&get_rs);
  curl_easy_setopt(curl_handle, CURLOPT_USERAGENT, "libcurl-agent/1.0");
  result = curl_easy_perform(curl_handle);
  if(result != CURLE_OK) {
    return 0;
  }
  char** roots = calloc(1000, sizeof(char**));
  char** cycle = calloc(1000, sizeof(char**));
  char** nodes = calloc(1000, sizeof(char**));
  char*** edges = calloc(2000, sizeof(char***));
  int founds[2000];
  int i;
  int k = 0;
  int l = 0;
  int rs_len = 0;
  int es_len = 0;
  int fs_len = 0;
  int ce_len = 0;
  int ns_len = 1;
  bool cmp_res;
  for(i = 0;i<1000;i++) {
    roots[i] = calloc(4, sizeof(char*));
    cycle[i] = calloc(4, sizeof(char*));
   }
   for(i = 0;i<1000;i++) {
    nodes[i] = calloc(4, sizeof(char*));
   }
   for(i = 0;i<2000;i++) {
     edges[i] = calloc(2, sizeof(char**));
     edges[i][0] = calloc(4, sizeof(char*)); 
     edges[i][1] = calloc(4, sizeof(char*));
   }
  i = k = 0;
  while(i < (get_rs.size - 1)) {
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
  while(i < (get_es.size - 1)) {
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
  for(i = 0;i<es_len;i++) printf("s%d: %s %s\n",i, edges[i][0], edges[i][1]);
  //for(i = 0;i<rs_len;i++) printf("r%d: %s\n",i, roots[i]);
// PARSING RESPONSES AND GETING ROOTS AND edges AS ARRAYS!!!!!!!!!!!!!!!
  memcpy(cycle, roots, rs_len);
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
       for(l = 0; l < rs_len;l++) cmp_res = compare(roots[l], edges[founds[i]][1]);
       if (!cmp_res) {
         my_cpy(cycle[ce_len], edges[founds[i]][1], 4);
         ce_len++;
       }
       edges[founds[i]][0][0] = edges[founds[i]][1][0] = '\0';
    }
  }
// Purviqt etap RDY!
  for(i = 0;i<es_len;i++) {
    for(k = 0; k < rs_len; k++) {
      if (edges[i][1][0] != '\0')
        //printf("%s\n",edges[i][1]); 
        break;
    }
  }
  //for(i = 0;i<es_len;i++) printf("s%d: %s %s\n",i, edges[i][0], edges[i][1]);
  curl_easy_cleanup(curl_handle);
  curl_global_cleanup();
  free(get_rs.memory);
  return 0;
}

